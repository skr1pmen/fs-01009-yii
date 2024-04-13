<?php

namespace app\entity;

use app\repository\UserRepository;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property integer $id Индификатор пользотеля
 * @property string $login Логин пользователя
 * @property string $password Пароль пользователя
 * @property string $name Имя пользователя
 * @property string $surname Фамилия пользователя
 * @property string $patronymic Отчество пользователя
 * @property integer $age Возрост пользователя
 * @property boolean $is_admin Флаг роли пользователя
 */
class Users extends ActiveRecord implements IdentityInterface
{
    public function getRequest()
    {
        return $this->hasMany(Requests::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return UserRepository::getUser($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findByUsername($username){
        return UserRepository::getUserByUsername($username);
    }

    public function validatePassword($password){
        return password_verify($password, $this->password);
    }

    public function getAuthKey(){}
    public function validateAuthKey($authKey)    {}
    public static function findIdentityByAccessToken($token, $type = null){}
}