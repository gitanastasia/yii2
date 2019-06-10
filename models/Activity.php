<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;

    public $description;

    public $startDate;

    public $endDate;

    public $isBlocked;

    public $isRepeat;

    public $authorId;

    public function rules()
    {
        return [
            ['title','string','min'=> 5],
            ['isBlocked','boolean'],
            ['isRepeat','boolean']
        ];

    }

    public function attributeLabels()
    {
        return [
           'title'=> 'Заголовок события',
            'description' => 'Описание',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'isBlocked' => 'Заблокировано',
            'isRepeat' => 'Повторить'

        ];

    }

}


