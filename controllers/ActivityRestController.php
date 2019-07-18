<?php


namespace app\controllers;


use app\models\Activity;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class ActivityRestController extends ActiveController
{
    public function behaviors()
    {
        $behaviors=parent::behaviors();
        $behaviors['authenticator']=[
            'class'=>HttpBearerAuth::class
        ];
        return $behaviors;
    }

    public $modelClass=Activity::class;

}