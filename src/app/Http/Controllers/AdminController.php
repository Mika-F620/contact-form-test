<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with('category')->paginate(7); // 7件ごとにページ分割
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $query = Contact::with('category');

        // 名前またはメールアドレスでの検索
    if ($request->filled('query')) {
        $search = trim($request->input('query'));

        // 入力に空白がある場合は、first_name と last_name で分けて検索
        if (strpos($search, ' ') !== false) {
            [$firstName, $lastName] = array_map('trim', explode(' ', $search, 2));
            $exactMatches = clone $query;
            $exactMatches->where(function ($q) use ($firstName, $lastName) {
                $q->where([
                    ['first_name', $firstName],
                    ['last_name', $lastName]
                ])
                ->orWhere([
                    ['first_name', $lastName],
                    ['last_name', $firstName]
                ]);
            });

            if ($exactMatches->count() > 0) {
                $query = $exactMatches;
            } else {
                $query->where(function ($q) use ($firstName, $lastName) {
                    $q->where('first_name', 'LIKE', "%{$firstName}%")
                      ->orWhere('last_name', 'LIKE', "%{$lastName}%")
                      ->orWhere('email', 'LIKE', "%{$firstName}%{$lastName}%");
                });
            }
        } else {
            // 空白なしでの通常検索
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%{$search}%")
                  ->orWhere('last_name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
    }

        // 性別の検索
        if ($request->filled('gender') && $request->input('gender') !== '全て') {
            $query->where('gender', $request->input('gender'));
        }

        // お問い合わせの種類の検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // 日付の検索
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        // ページネーションに検索条件を引き継ぎ
        $contacts = $query->paginate(7)->appends($request->all());
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }  
    
    public function export(Request $request)
    {
        // 出力する検索条件付きのデータを取得
        $query = Contact::with('category');
        
        if ($request->filled('query')) {
            $search = $request->input('query');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        if ($request->filled('gender') && $request->input('gender') !== '全て') {
            $query->where('gender', $request->input('gender'));
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->get();

        // CSVダウンロードのレスポンスを返す
        $response = new StreamedResponse(function() use ($contacts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', 'お問い合わせ内容']);
            
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->gender,
                    $contact->email,
                    $contact->category->content ?? 'なし',
                    $contact->detail
                ]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contacts.csv"');
        return $response;
    }

}
