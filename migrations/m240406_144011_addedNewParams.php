<?php

use yii\db\Migration;

class m240406_144011_addedNewParams extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('users', 'username');
        $this->addColumn('users', 'name', $this->string()->notNull());
        $this->addColumn('users', 'surname', $this->string()->notNull());
        $this->addColumn('users', 'patronymic', $this->string());

        $this->update('users', 'name', );
    }

    public function safeDown()
    {
        return true;
    }
}
