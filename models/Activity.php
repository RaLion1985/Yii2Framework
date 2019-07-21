<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $eventPriority; // Приоритет события

    public $dateStart;
    public  $dateEnd; // Окончание события

    public $isBlocked;

    public function rules()
    {
        return [
          ['title','required'],
          ['description','string','min' => 5],
          ['eventPriority','string'],
          ['dateStart','string'],
          ['dateEnd','string'],
          ['isBlocked','boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=> 'Заголовок',
            'description'=>'Описание',
            'eventPriority'=>'Приоритет события',
            'dateStart'=>'Время старта',
            'dateEnd'=>'Время окончания',
            'isBlocked'=>'Заюлокировать событие'
        ];
    }
}