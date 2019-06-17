<?php

use yii\db\Migration;

/**
 * Class m190615_091800_CreateTables
 */
class m190615_091800_CreateTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(150)->notNull()->comment('Заголовок'),
            'description'=>$this->text()->comment('Описание'),
            'startDate'=>$this->date()->notNull()->comment('Дата начала'),
            'endDate'=>$this->date()->comment('Дата окончания'),
            'isBlocked'=>$this->boolean()->notNull()->defaultValue(0)->comment('Заблокиовать'),
            'isRepeat'=>$this->boolean()->notNull()->defaultValue(0)->comment('Повторить'),
            'img' => $this->string(255)->defaultValue(null)->comment('Изображение'),
            'email'=>$this->string(150),
            'useNotification'=>$this->boolean()->notNull()->defaultValue(0)->comment('Оповещение по email'),
            'create_at'=>$this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createTable('users',[
            'id'=>$this->primaryKey(),
            'email'=>$this->string(150)->notNull()
                ->unique(),
            'password_hash'=>$this->string(300)->notNull()->comment('Шифрованный пароль'),
            'auth_token'=>$this->string(300),
            'auth_key'=>$this->string(150)->comment('Ключ для авторизации'),
            'created_at'=>$this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190615_091800_CreateTables cannot be reverted.\n";

        return false;
    }
    */
}
