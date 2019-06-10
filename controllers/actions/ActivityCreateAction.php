<?php


namespace app\controllers\actions;


use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public function run() {

        $model=new Activity();

        return $this->controller->render('create', ['model'=>$model]);
    }

}