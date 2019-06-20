<?php


namespace app\controllers\actions;


use app\components\AuthComponent;
use app\models\Users;
use yii\base\Action;

class SignUpAction extends Action
{
   public function actionSignUp(){

        /** @var AuthComponent  $comp */

        $comp=\Yii::createObject(['class'=>AuthComponent::class,
            'modelClass' => '\app\models\Users']);

        $model=$comp->getModel();

        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post())){

            if ($comp->signUp($model)){

                return $this->redirect(['/auth/sign-in']);
            }
        }

       return $this->controller->render('signup',['model'=>$model]);
    }



}