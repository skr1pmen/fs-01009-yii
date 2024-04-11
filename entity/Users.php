<?php

namespace app\entity;

use yii\db\ActiveRecord;
/**
 * @property integer $id Индификатор пользотеля
 * @property string $login Логин пользователя
 * @property string $password Пароль пользователя
 * @property string $username Имя пользователя
 * @property integer $age Возрост пользователя
 * @property boolean $is_admin Флаг роли пользователя
 */
class Users extends ActiveRecord
{
    public function getRequest()
    {
        return $this->hasMany(Requests::class, ['user_id' => 'id']);
    }
}