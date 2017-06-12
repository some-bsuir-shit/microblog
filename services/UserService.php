<?php

namespace app\services;

use app\models\User;

class UserService
{

    public function findById($id)
    {
        return User::findOne($id);
    }

    public function findByUsername($username)
    {
        return User::findOne(['login' => $username]);
    }

    public function register($username, $password, $email, $firstName, $lastName, $city_id)
    {

        $user = new User([
            'login' => $username,
            'password' => $password,
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'city_id' => $city_id
        ]);

        return $user->save();
    }

}
