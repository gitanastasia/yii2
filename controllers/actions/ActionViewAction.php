<?php


namespace app\controllers\actions;


use yii\base\Action;
use yii\web\HttpException;

class ActionViewAction extends Action
{
    public function run($id){
        $model= \Yii::$app->activity->findActivityByID($id);
        if(!$model){
            throw new HttpException(404, 'activity not found');
        }

        if(!\Yii::$app->rbac->canViewOrEditActivity($model)){
            throw new HttpException(403, 'no permission');
        }

        return $this->controller->render('view',['model'=>$model]);
    }
}