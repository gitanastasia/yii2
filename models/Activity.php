<?php


namespace app\models;


use app\models\validations\StopPhraseValidation;
use yii\base\Model;

class Activity extends ActivityBase
{
    public $repeatType;

    public const REPEAT_TYPE=['0'=>'','1d'=>'Каждый день','1w'=>'Каждую неделю'];

  //  public $img;

    public  $emailRepeat;

    public $useNotification;


    public function beforeValidate()
    {
        if($this->startDate){
            if($date=\DateTime::createFromFormat('d.m.Y',$this->startDate)){
                $this->startDate=$date->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }


    public function rules()
    {
        return array_merge([
            ['title','string','min'=> 3, 'max' => 255],
            ['title','trim'], //убирает пробелы
            [['title','startDate'], 'required' ],

            ['title',StopPhraseValidation::class],
            ['description', 'string','max'=> 255],
            [['startDate','endDate','isRepeat'],'date','format' => 'php:Y-m-d'],
            [['isBlocked','useNotification'],'boolean'],
            ['repeatType','in','range' => array_keys(self::REPEAT_TYPE)],
            ['img','file','extensions' => ['jpg','png']],
            ['email','email'],
            [['isRepeat'],'default','value' => 0],
            ['email','required','when' => function($model){
                return $model->useNotification;
            }],
            ['emailRepeat','compare','compareAttribute' => 'email']

        ],parent::rules());

    }
    /*функция для запретных фраз*/

    public function stopPhraseTitle($attr){
        if(in_array($this->title,['шаурма','бордюр'])){
            $this->addError($attr,'Недопустимое название события');
        }
    }

    public function attributeLabels()
    {
        return [
           'title'=> 'Заголовок события',
            'description' => 'Описание',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'isBlocked' => 'Заблокировать',
            'isRepeat' => 'Повторить датой',
            'repeatType' => 'Повторить',
            'useNotification' => 'Сообщить по Email',
            'email' => 'Введите Email'

        ];

    }

}


