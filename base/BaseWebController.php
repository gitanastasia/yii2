<?php


namespace app\base;


use yii\web\Controller;
use yii\web\HttpException;


class BaseWebController extends Controller
{


    //переход на страницу регистрации незалогинного пользовотеля
   public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){
            return $this->redirect(['/auth/sign-up']); //throw new HttpException(401, 'need auth');
        }

        return parent::beforeAction($action);
    }


   public function afterAction($action, $result)
    {
        \Yii::$app->session->setFlash('pageBack',\Yii::$app->request->pathInfo);
        return parent::afterAction($action, $result);
    }

}