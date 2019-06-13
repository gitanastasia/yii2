<?php


namespace app\controllers;


use app\base\BaseWebController;
use app\components\DaoComponent;
use yii\base\InvalidConfigException;

class DaoController extends BaseWebController
{
    public function actionTest(){
        /** @var DaoComponent $comp */

        $comp = \Yii::createObject(DaoComponent::class);

        $users=$comp->getUsersAll();
        $activityUser=$comp->getActivityUser(
            \Yii::$app->request->get('user'),1);

        $firstActivity=$comp->getFirstActivityBlocked();

        $cnt=$comp->getCountActivity();

        $reader=$comp->getBigData();

        $comp->insertsTransaction();

        return $this->render('test',['users'=>$users,
            'acitivtyUser'=>$activityUser,'firstActivity'=>$firstActivity,
            'cnt'=>$cnt,'reader'=>$reader]);

    }
}