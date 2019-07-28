<?php


namespace app\models;


use app\models\validation\titleValidation;
use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $eventPriority; // Приоритет события

    public $dateStart;
    public $dateEnd; // Окончание события
    public $isIterated;
    public $iteratedType;

    public $isBlocked;

    public $email;
    public $emailRepeat;

    public $useNotification;

    const REPEAT_TYPE = [
        0 => 'Каждый день',
        1 => 'Каждую неделю'
    ];

    public $image;

    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y', $this->dateEnd);
        if ($date) {
            $this->dateEnd = $date->format('Y-m-d');
        }
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function rules()
    {
        return [
            ['image','file','extensions'=>['jpg','png'],'maxFiles'=>4],
            [['title', 'email'], 'trim'], // Удаление пробелов
            [['title', 'dateEnd'], 'required','message'=>'Обязательно'],
            ['dateEnd', 'date', 'format' => 'php:Y-m-d'],
            //  ['phone','string','length'=>10] - Строго 10 символов
            ['description', 'string', 'min' => 5, 'max' => 300],
            ['eventPriority', 'string'],
            ['dateStart', 'string'],
            ['dateEnd', 'string'],
            [['isBlocked', 'useNotification'], 'boolean'],

            ['iteratedType','in','range' => array_keys(self::REPEAT_TYPE)],

            ['email', 'email'],
            ['email', 'required', 'when' => function (Activity $model) {
                return $model->useNotification ? true : false;
            }],
            ['emailRepeat', 'compare', 'compareAttribute' => 'email'],
            //['title','titleValidate']
            ['title',titleValidation::class ,'list'=>['admin','Шаурма']],
           //   ['title','match','pattern'=> '/[a-z]{0,}/ig'],
        ];
    }
/*
    public function titleValidate($attr){
        if($this->title=='admin'){
            $this->addError('title','Запрещенное названия события');
        }
    }
*/
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'eventPriority' => 'Приоритет события',
            'dateStart' => 'Время старта',
            'isIterated' => 'Повтор события',
            'dateEnd' => 'Время окончания',
            'useNotification' => 'Получать сообщения на почту?',
            'isBlocked' => 'Заблокировать событие'
        ];
    }
}