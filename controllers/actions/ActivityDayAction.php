<?php


namespace app\controllers\actions;


use app\models\Day;
use yii\base\Action;

class ActivityDayAction extends Action
{
    public function run() {

        $model=new Day();

        return $this->controller->render('day', ['model'=>$model]);
    }

}