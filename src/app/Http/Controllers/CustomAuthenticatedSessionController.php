<?php
namespace App\Http\Controllers;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;

class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    public function destroy(Request $request): LogoutResponse
    {
        parent::destroy($request);  // 親クラスのdestroyメソッドでログアウト処理を実行

        return app(LogoutResponse::class);  // カスタムLogoutResponseを返す
    }
}
