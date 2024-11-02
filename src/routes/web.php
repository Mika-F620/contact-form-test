<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// トップページ（アクセス自由）
Route::get('/', [ContactController::class, 'index'])->name('home');

// 認証ユーザー専用の管理ページ（ログイン後にのみアクセス可能）
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Fortifyのデフォルトルートで登録・ログインページを表示
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
// POST /loginでの認証リクエスト
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// 他のルートの設定の後に追加
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
