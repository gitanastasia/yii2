<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $title;

    public $description;

    public $working;

    public $weekend;

    public $authorId;

    public function rules()
    {
        return [
            ['title','integer'],
            ['working','boolean'],
            ['weekend','boolean']
        ];

    }

    public function attributeLabels()
    {
        return [
            'title'=> 'Дата',
            'description' => 'Описание',
            'working' => 'Рабочий день',
            'weekend' => 'Выходной'

        ];

    }

}