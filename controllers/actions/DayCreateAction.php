<?php


namespace app\controllers\actions;


use app\components\DayComponent;
use app\models\Day;
use yii\base\Action;

class DayCreateAction extends Action
{
    public function run() {

        /** @var DayComponent  $comp */
        $comp=\Yii::createObject(['class'=>DayComponent::class,
            'modelClass' => '\app\models\Day']);

        $model=$comp->getModel();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if($comp->createDay($model)) {
                echo 'OK';
                exit;
            }
        }

        return $this->controller->render('create', ['model'=>$model]);
    }

}