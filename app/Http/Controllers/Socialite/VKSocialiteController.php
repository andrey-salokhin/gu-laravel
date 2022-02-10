<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Services\SocialiteService;
use Laravel\Socialite\Facades\Socialite;


class VKSocialiteController extends Controller

{
    public function redirectToProvider() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleProviderCallback() {
        $user = Socialite::driver('vkontakte')->user();
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
