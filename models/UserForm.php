<?php

namespace app\models;

use yii\base\Model;

class UserForm extends Model
{
    public $login;
    public $age;
    public $password;
    public $passwordRepeat;
    public $name;
    public $surname;
    public $patronymic;

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'age' => 'Возраст',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторённый пароль',
            'name' => "Ваше имя",
            'surname' => "Ваша фамилия",
            'patronymic' => "Ваше отчество"
        ];
    }

    public function rules()
    {
        return [
            [['login', 'age', 'password', 'passwordRepeat', 'name', 'surname'], 'required'],
            ['age', 'integer'],
            [['login', 'patronymic'], 'string'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['age', 'validateAge']
        ];
    }

    public function validateAge($attribute, $params)
    {
        if (!$this->hasErrors()){
            $age = $this->age;
            if ($age > 100){
                $this->addError($attribute, 'Вы слишком старый');
            }
        }
    }
}