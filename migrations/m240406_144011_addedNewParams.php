<?php

use yii\db\Migration;

class m240406_144011_addedNewParams extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('users', 'username');
        $this->addColumn('users', 'name', $this->string());
        $this->addColumn('users', 'surname', $this->string());
        $this->addColumn('users', 'patronymic', $this->string());
        $this->update('users',
            [
                'name' => 'Админ',
                'surname' => 'Админов',
                'patronymic' => 'Админович'
            ],
            ['login' => 'admin']
        );
        $this->alterColumn('users', 'name', $this->string()->notNull());
        $this->alterColumn('users', 'surname', $this->string()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('users', 'name');
        $this->dropColumn('users', 'surname');
        $this->dropColumn('users', 'patronymic');
        $this->addColumn('users', 'username', $this->string());
        $this->update('users',
            ['username' => 'Админ Админович'],
            ['login' => 'admin']
        );
        $this->alterColumn('users', 'username', $this->string()->notNull());
    }
}
