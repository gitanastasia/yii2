<?php


namespace app\controllers;


use app\base\BaseWebController;
use app\controllers\actions\ActivityDayAction;

class DayController extends BaseWebController
{

    public function actions()
    {
        return [
            'day'=>['class'=>ActivityDayAction::class]
        ];
    }
}
{

}