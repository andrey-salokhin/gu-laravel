<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteService {

    public $generatedPassword = NULL;

    public function saveUser ($user) {
        $email = $user->getEmail();
        $name = $user->getName();

        $model = User::where('email', $email)->first();

        if($model) {
            $model->saveSocialUser(['email' => $email,'name' => $name]);

            if ($model) {
                Auth::loginUsingId($model->id);
            }
        }else {
            $newUser = new User();
            $this->generatedPassword = Str::random(8);
            $newUser->createSocialUser(['email' => $email,'name' => $name,'password' => Hash::make($this->generatedPassword)]);
            if ($newUser) {
                Auth::loginUsingId($newUser->id);
            }
        }
        return true;
    }

    public function getGeneratedPassword () {
        return $this->generatedPassword;
    }
}
