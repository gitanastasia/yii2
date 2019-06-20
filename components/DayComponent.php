<?php


namespace app\components;


use app\models\Day;
use yii\base\Component;

class DayComponent extends Component
{
    public $modelClass;
    /**
     * return Model
     */
    public function getModel(){
        return new $this->modelClass;

    }

   public function createDay(Day &$model):bool{
       if($model->validate()){
           return true;
       }
       return false;
   }

}