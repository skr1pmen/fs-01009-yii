<?php

use yii\db\Migration;

class m240406_134619_initDB extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->unique()->notNull(),
            'password' =>$this->string()->notNull(),
            'username' => $this->string()->notNull(),
            'age' => $this->integer(),
            'is_admin' => $this->boolean()->defaultValue(false)
        ]);

        $this->insert('users', [
            'login' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'username' => 'Админ Админович',
            'age' => 12,
            'is_admin' => true
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
