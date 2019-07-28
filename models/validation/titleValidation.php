<?php


namespace app\models\validation;


use yii\validators\Validator;

class titleValidation extends Validator
{

    public $list;
    public function validateAttribute($model, $attribute)
    {
        if(in_array($model->$attribute,$this->list)){
            $model->addError('title','Запрещенное названия события');
        }
    }
}