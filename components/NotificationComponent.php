<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\console\Application;
use yii\helpers\Console;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /**@var MailerInterface*/
    public $mailer;

    /**
     * @param $activities Activity[]
     * @return bool
     */
    public function sendNotification($activities):bool {
        foreach ($activities as $activity){
            $sent=$this->mailer->compose('notification', ['title'=>$activity->title,
                'description'=>$activity->description])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo(trim($activity->email))
                ->setSubject('Событие стартует сегодня')
                ->send();
            if ($sent){
                if(\Yii::$app instanceof Application){
                    echo Console::ansiFormat('Sent mail to '.$activity->email,
                            [Console::FG_GREEN]).PHP_EOL;
                }
            }else{
                echo 'error'.PHP_EOL;
                return false;
            }
        }
        return true;
    }
}