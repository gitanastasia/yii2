<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Activities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Activity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                //порядковый номер
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //заголовки-ссылки
            ['attribute'=> 'title',
                'format'=> 'html',
                'label' => 'Название события',
                'value' => function($model){
                    return Html::a(Html::encode($model->title),['/activity/view',
                        'id'=>$model->id]);
                }
             ],
            //attribute:текс в формате ntext:label
            'description:ntext:Описание',
            ['attribute'=>'startDate',
                'value' => function(\app\models\Activity $model){
                    $model->attachBehavior('getDate',
                        ['class'=>\app\behaviors\GetDateCreatedBehavior::class,
                            'attribute_name' => 'create_at']);
                    //заменяем на функцию поведения из GetDateCreatedBehavior
                   return $model->getDateCreated();
                   // return Yii::$app->formatter->asDate($model->startDate,
                      //  'php:d.m.Y'); //форматирует дату

                }


            ],
            //заголовки -можно раскомментировать
            'endDate',
            //'isBlocked',
            //'isRepeat',
            //'img',
            //'email:email',
            //'useNotification',
            //'create_at',

            //в поле user_id покажет email

           // ['attribute'=> 'user_id',
            //    'value'=> function(\app\models\Activity $model){
           //         return $model->user->email; //getUser()->one()заменим на user
            //    }],
            //в поле user_id покажет email
            'user.email',

            //кнопки глаза, редактирования
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
