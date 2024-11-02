<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // ← ここでContactモデルをインポート

class AdminController extends Controller
{
    public function index()
    {
        // Contactsテーブルとcategoriesテーブルを紐付けたデータを取得
        $contacts = Contact::with('category')->get();
        return view('admin', compact('contacts'));
    }
}
