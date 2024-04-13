<?php

namespace app\repository;

use app\entity\Users;

class UserRepository
{
    public static function getAllUsers()
    {
        return Users::find()->orderBy(['id'=>SORT_ASC])->all();
    } // SELECT * FROM users ORDER BY id ASC

    public static function createUser($login, $password, $age, $name, $surname, $patronymic = null)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->age = $age;
        $user->name = $name;
        $user->surname = $surname;
        $user->patronymic = $patronymic;
        $user->save();
        return $user->id;

        // INSERT INTO users (login, password, age, username)
        //                  VALUES ($login, $password, $age, $username);
    }

    public static function getUser($id)
    {
        return Users::find()->where(['id' => $id])->one();
    } // SELECT * FROM users WHERE id = :id LIMIT 1

    public static function getUserByUsername($username){
        return Users::find()->where(['login' => $username])->one();
    } // SELECT * FROM users WHERE login = :username LIMIT 1
}