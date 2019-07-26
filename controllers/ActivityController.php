<?php


namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\activity\CreateAction;
use app\controllers\actions\activity\DayAction;
use app\models\Activity;


class ActivityController extends BaseController
{
    public function actions(){
        return [
            'create'=>['class'=>CreateAction::class,'classEntity' => Activity::class],
            'day'=>['class'=>DayAction::class,'classEntity' => Activity::class]
        ];
    }
}