<?php


namespace app\controllers;


use app\base\BaseWebController;
use app\components\DaoComponent;
use yii\filters\PageCache;

class DaoController extends BaseWebController
{
   /* public function behaviors()
    {
        return [
            ['class'=>PageCache::class, 'only'=>'test','duration'=>15]
            ];
    }*/

    public function actionTest() {

        /** @var DaoComponent $comp */

        $comp = \Yii::createObject(DaoComponent::class);

        $users=$comp->getUsersAll();

        $activityUser=$comp->getActivityUser(\Yii::$app->request->get('user'),1);

        $firstActivity=$comp->getFirstActivityBlocked();

        $cnt=$comp->getCountActivity();

        $reader=$comp->getBigData();

      //  $comp->insertsTransaction();

        return $this->render('test',['users'=>$users, 'activityUser'=>$activityUser,
            'firstActivity'=>$firstActivity,'cnt'=>$cnt,'reader'=>$reader]);

    }

    public function actionCache(){
        //положить параметр в кеш - указываем ключ и значение
        // \Yii::$app->cache->set('key', 'vale1');

        //получить значение
        $val=\Yii::$app->cache->get('key');

        //положить и получить значение
        $val=\Yii::$app->cache->getOrSet('key1',function(){
            return 'val';
        });

        //сбрасываем в кеш из приложения
        // \Yii::$app->cache->flush();
        echo $val;
    }

}