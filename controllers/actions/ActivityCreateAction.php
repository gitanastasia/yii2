<?php


namespace app\controllers\actions;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;
use yii\web\HttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends Action
{
    /**
     * @return array|string
     * @throws \yii\base\InvalidConfigException
     */
  public function run() {
      if(!\Yii::$app->rbac->canCreateActivity()){
          throw new HttpException(403,'Not allowed');
      }

        /** @var ActivityComponent  $comp */
        $comp = \Yii::createObject(['class' => ActivityComponent::class,
            'modelClass' => 'app\models\Activity']);

        $model=$comp->getModel();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if($comp->createActivity($model)){
                //echo 'OK';
                //exit;
                return $this->controller->render('view',['model'=>$model]);
            }
        }
        //$url = $model -> getLink();

        return $this->controller->render('create', ['model'=>$model]);
    }

}