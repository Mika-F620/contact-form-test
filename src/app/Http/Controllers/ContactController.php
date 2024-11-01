<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CategoryRequest;

class ContactController extends Controller
{
    public function index(ContactRequest $request)
    {
        return view('index');
    }
    public function confirm(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tell', 'address', 'building', 'content', 'detail']);
        // tellの配列をハイフンで結合して文字列化
        $contact['tell'] = implode('-', $request->input('tell', []));
        return view('confirm', compact('contact'));
    }
    public function thanks(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tell', 'address', 'building', 'content', 'detail']);
        // tellの配列をハイフンで結合して文字列化
        $contact['tell'] = implode('-', $request->input('tell', []));
    }
    public function admin()
    {
        return view('admin');
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
}
