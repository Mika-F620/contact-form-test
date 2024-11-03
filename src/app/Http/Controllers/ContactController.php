<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Contactモデルのインポート
use App\Models\Category;  // Categoryモデルをインポート
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class ContactController extends Controller
{
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name', 'first_name', 'gender', 'email', 'tell', 
            'address', 'building', 'category_id', 'detail'
        ]);
    
        $contact['tell'] = implode('-', $request->input('tell', []));
    
        // 選択されたcategory_idからカテゴリ内容を取得し、contact配列に保存
        $contact['category'] = Category::find($contact['category_id'])->content ?? 'なし';
    
        // セッションにcontactデータを保存
        $request->session()->put('contact', $contact);
    
        return view('confirm', compact('contact'));
    }
    public function thanks(Request $request)
    {
        // セッションからデータを取得
    $contactData = $request->session()->get('contact');

    // Contactインスタンスを作成してデータを保存
    $contact = new Contact;
    $contact->last_name = $contactData['last_name'];
    $contact->first_name = $contactData['first_name'];
    $contact->gender = $contactData['gender'];
    $contact->email = $contactData['email'];
    $contact->tell = $contactData['tell'];
    $contact->address = $contactData['address'];
    $contact->building = $contactData['building'];
    $contact->category_id = $contactData['category_id'];  // category_idを保存
    $contact->detail = $contactData['detail'];    // お問い合わせ内容
    $contact->save();

    return view('thanks');
    }
    public function admin()
    {
        return view('admin');
    }
    public function register(RegisterRequest $request)
    {
        $contact = $request->only(['name', 'email', 'password']);
        return view('register', ['contact' => $contact]);
    }
    public function login(LoginRequest $request)
    {
        $contact = $request->only(['email', 'password']);
        return view('login', ['contact' => $contact]);
    }
    public function index(Request $request)
    {
        // Categoryモデルから全てのカテゴリーを取得
        $categories = Category::all();

        // 取得したカテゴリーデータをビューに渡す
        return view('index', compact('categories'));
    }
    public function show($id)
{
    try {
        $contact = Contact::with('category')->findOrFail($id);
        return response()->json($contact);  // JSON形式でレスポンスを返す
    } catch (\Exception $e) {
        // エラーログに出力
        \Log::error('Error in ContactController@show: ' . $e->getMessage());
        return response()->json(['error' => 'Contact not found'], 500);
    }
}
}
