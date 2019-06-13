<?php


namespace app\controllers;


use app\base\BaseWebController;
use app\controllers\actions\DayCreateAction;

class DayController extends BaseWebController
{

    public function actions()
    {
        return [
            'create'=>['class'=>DayCreateAction::class]
        ];
    }
}
{

}