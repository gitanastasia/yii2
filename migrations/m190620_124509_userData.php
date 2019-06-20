<?php

use yii\db\Migration;

/**
 * Class m190620_124509_userData
 */
class m190620_124509_userData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id'=>1,
            'email'=>'admin1@test.ru',
            'password_hash'=>Yii::$app->security->generatePasswordHash('123456'),

        ]);
        $this->insert('users',[
            'id'=>2,
            'email'=>'user2@test.ru',
            'password_hash'=>Yii::$app->security->generatePasswordHash('123456'),
        ]);

        $this->batchInsert('activity',['title',
            'startDate','isBlocked','user_id'],[
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),1],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),1],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),2],
        ]);

        //Создаем роли для пользователей
        $auth = \Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');


        $auth->assign($admin, 1);
        $auth->assign($user, 2);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity');
        $this->delete('users');

        //Удаляем роли для пользователей
        $auth = \Yii::$app->authManager;
        $auth->removeAllRoles();

    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190620_124509_userData cannot be reverted.\n";

        return false;
    }
    */
}
