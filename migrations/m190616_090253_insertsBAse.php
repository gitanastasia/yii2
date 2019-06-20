<?php

use yii\db\Migration;

/**
 * Class m190616_090253_insertsBAse
 */
class m190616_090253_insertsBAse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->batchInsert('activity',['title',
            'startDate','isBlocked','user_id'],[
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),6],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),6],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),6],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),6],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),7],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),7],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),7],
            ['task '.mt_rand(0,22223),date('Y-m-d'),mt_rand(0,1),7],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity');
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190616_090253_insertsBAse cannot be reverted.\n";

        return false;
    }
    */
}
