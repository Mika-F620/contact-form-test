<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function confirm(Request $request)
    {
        $contact = $request->only(['lastname', 'firstname', 'gender', 'email', 'telfirst', 'telmiddle', 'tellast', 'address', 'building', 'kinds', 'content']);
        return view('confirm', compact('contact'));
    }
    public function thanks(Request $request)
    {
        $contact = $request->only(['lastname', 'firstname', 'gender', 'email', 'telfirst', 'telmiddle', 'tellast', 'address', 'building', 'kinds', 'content']);
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
