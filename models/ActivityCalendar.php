<?php


namespace app\models;

use yii\base\Model;

class ActivityCalendar extends Model
{

    public $dateCalendar;


    public function rules()
    {
        return [
            ['dateCalendar','date', 'format' => 'php:Y-m-d'],
            ['dateCalendar','string']
        ];

    }


}