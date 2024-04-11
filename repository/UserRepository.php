<?php

namespace app\repository;

use app\entity\Users;

class UserRepository
{
    public static function getAllUsers()
    {
        return Users::find()->orderBy(['id'=>SORT_ASC])->all();
    }

    public static function createUser($login, $password, $age, $username)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->age = $age;
        $user->username = $username;
        $user->save();
        return $user->id;

        // INSERT INTO users (login, password, age, username)
        //                  VALUES ($login, $password, $age, $username);
    }

    public static function getUser($id)
    {
        return Users::find()->where(['id' => $id])->one();
    }
}