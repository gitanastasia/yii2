<?php


namespace app\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\log\Logger;

class ShowLogBehavior extends Behavior
{   //подвязываем событие afterFind через функцию
    public function events()
    {
        return [
          ActiveRecord::EVENT_AFTER_FIND=>'inLog'
        ];
    }

    //оообщение отправляется в log
    public function inLog(){
        \Yii::getLogger()->log('in logger event', Logger::LEVEL_WARNING);
    }

}