<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function firstOrCreateUser(array $userData)
    {
        $newUserData = [
            'uid'       => $userData['uid'],
            'name'      => $userData['name'],
            'email'     => $userData['email'] . '@cs.nctu.edu.tw',
            'username'      => $userData['username'],
            //'remember_token'    => $userData['remember_token'],
        ];

        $user = User::where('uid', $userData['uid'])->first();

        if (isset($user)) {
            $user->forceFill($newUserData);
            $user->save();

            return $user;
        }

        return User::forceCreate($newUserData);
    }
}
