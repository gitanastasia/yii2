<?php


namespace app\widgets\dao;


use yii\base\Widget;

class DaoWidget extends Widget
{
    public $users;

    public function init()
    {
        parent::init();
        if(!$this->users){
            throw new \Exception('Users param is required');
        }
    }

    public function run()
    {

        return $this->render('index',['users'=>$this->users]);
    }

}