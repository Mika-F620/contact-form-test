<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\CustomLogoutResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;         // Requestをインポート
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest; // FortifyのLoginRequestを正確にインポート
use App\Models\User;
use Illuminate\Support\Facades\Validator; // Validatorをインポート

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(LogoutResponse::class, CustomLogoutResponse::class);
    }
    
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::registerView(fn() => view('auth.register'));
        Fortify::loginView(fn() => view('auth.login'));

        Fortify::authenticateUsing(function (LoginRequest $request) {  // Laravel\Fortify\Http\Requests\LoginRequestを使用
            // バリデーションルールとメッセージを指定してValidatorを適用
            $validator = Validator::make(
                $request->only(['email', 'password']),
                [
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'min:8'],
                ],
                [
                    'email.required' => 'メールアドレスを入力してください',
                    'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
                    'email.max' => 'メールアドレスを255文字以下で入力してください',
                    'password.required' => 'パスワードを入力してください',
                    'password.min' => 'パスワードは8文字以上で入力してください',
                ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // ユーザーが存在し、パスワードが一致するか確認
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}
