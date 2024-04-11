<?php

namespace app\entity;

use yii\db\ActiveRecord;

class Requests extends ActiveRecord
{
    public function getUser()
    {
        return $this->hasOne(Users::class, ['user_id' => 'id']);
    }
}