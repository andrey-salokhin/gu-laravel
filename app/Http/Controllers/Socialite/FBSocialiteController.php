<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Services\SocialiteService;
use http\Exception;
use Laravel\Socialite\Facades\Socialite;

class FBSocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $objSocialite = new SocialiteService();
        $objSocialite->saveUser($user);
        $newUserPassword = $objSocialite->getGeneratedPassword();
        if($newUserPassword) {
            return redirect()->route('account.index')->with(['password' => 'Запомнните ваш пароль ' . $newUserPassword]);
        } else {
            return redirect()->route('account.index')->with('success', 'Вход успешно выполнен!');
        }
    }
}
