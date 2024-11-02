<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// トップページ（アクセス自由）
Route::get('/', [ContactController::class, 'index'])->name('home');

Route::get('/confirm', [ContactController::class, 'confirm'])->name('confirm.get');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm.post');

Route::post('/thanks', [ContactController::class, 'thanks'])->name('thanks');

Route::post('/admin/search', [AdminController::class, 'search'])->name('admin.search');
// 認証ユーザー専用の管理ページ（ログイン後にのみアクセス可能）
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

// Fortifyのデフォルトルートで登録・ログインページを表示
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
// POST /loginでの認証リクエスト
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// 他のルートの設定の後に追加
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
