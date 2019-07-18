<?php
namespace app\components;

use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $modelClass;
    /**
     * return Activity
     */
    public function getModel(){
        return new $this->modelClass;

    }
    public function createActivity(Activity &$model):bool{
        $model->img=UploadedFile::getInstance($model,'img');
        $model->user_id=\Yii::$app->user->id;

        if ($model->save()){
            if($model->img && $this->saveFile($model->img,$file_name)){
                $model->img=$file_name;
            }
            return true;
        }
        return false;
    }

    /**
     * @param $from
     * @return Activity[]
     */
    public function getNotificationActivity($from):?array {
        $activities=$this->getModel()::find()
            ->andWhere('startDate>=:date',[':date' => $from])
            ->andWhere(['useNotification'=>1])
            ->all();
        return $activities;
    }

    //возвратить null или экземпляр модели
    /**
     * @param $id
     * @return Activity|null
     */
    public function findActivityByID($id):?Activity
    {
        return Activity::find()->andWhere(['id'=>$id])->one();

    }

    private function saveFile (UploadedFile $file, &$file_name):bool{
        $file_name=$this->genNameFile($file);
        $path=$this->genPathToSaveFile($file_name);
        return $file->saveAs($path);
    }

    private function genPathToSaveFile($file_name):string {
        FileHelper::createDirectory(\Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.'images');
        $path=\Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.'images'.
            DIRECTORY_SEPARATOR.$file_name;
        return $path;
    }

    private function genNameFile(UploadedFile $file):string {
        return $file->name.'_'.mt_rand(0,9999).'_'.time().'.'.$file->extension;
    }

}