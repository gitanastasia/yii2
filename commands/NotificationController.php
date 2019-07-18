<?php




namespace app\commands;

use app\components\ActivityComponent;
use app\components\NotificationComponent;
use yii\console\Controller;
use yii\helpers\Console;

class NotificationController extends Controller
{
    public $date;
    //alias для парметра date, где ключ - alias, значение -название параметра
    public function optionAliases()
    {
        return[
            'd'=>'date'
        ];
    }

    public function options($actionID)
    {
        //возвращаем настроечнный массив с обязательными параметрами для любого actionID
        return [
            'date'
        ];
    }

    public function actionTest(){
        echo 'ok'.PHP_EOL;

       print_r($this->date);

    }

    public function actionSend(){
        /**@var ActivityComponent $actComp */

        $actComp=\Yii::$app->activity;
        $activities=$actComp->getNotificationActivity($this->date);

        /** @var NotificationComponent $notifComp */

        $notifComp=\Yii::createObject(['class'=>NotificationComponent::class,
            'mailer'=>\Yii::$app->mailer]);

        if($notifComp->sendNotification($activities)){
            echo $this->ansiFormat('All mail success',
                    Console::FG_PURPLE).PHP_EOL;
        }

    }

}