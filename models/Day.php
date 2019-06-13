<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $title;

    public $description;

    public $working;

    public $weekend;

    public $userId;

    public function rules()
    {
        return [
            ['title','date','format' => 'php:Y-m-d'],
            ['description','string'],
            ['working','boolean'],
            ['weekend','boolean']
        ];

    }

    public function attributeLabels()
    {
        return [
            'title'=> 'Дата',
            'description' => 'План на день',
            'working' => 'Рабочий день',
            'weekend' => 'Выходной'

        ];

    }

}