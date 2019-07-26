<?php


namespace app\models;


use yii\base\Model;

class ActivityDay extends Model
{
    public $titleEvent;
    public $typeOfDay;


    public function rules()
    {
        return [
          ['titleEvent','required'],
          ['typeOfDay','string'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'titleEvent'=> 'Заголовок связанного события',
            'typeOfDay'=>'Выходной/рабочий день',
        ];
    }
}