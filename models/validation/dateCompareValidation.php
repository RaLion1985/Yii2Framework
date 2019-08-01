<?php


namespace app\models\validation;


use yii\validators\Validator;

class dateCompareValidation extends Validator
{
    public $dateStart;
    public $dateEnd;

    public function validateAttribute($model, $attribute)
    {
        $date = \DateTime::createFromFormat('d-m-Y', $this->dateEnd);
        if ($date) {
            $this->dateEnd = $date->format('Y-m-d');
        }
        $date = \DateTime::createFromFormat('d.m.Y', $this->dateStart);
        if ($date) {
            $this->dateStart = $date->format('Y-m-d');
        }
        //$model->addError('dateEnd',$this->dateStart);

        if (($this->dateEnd) < ($this->dateStart)) {
            $model->addError('dateEnd', 'Дата окончания не может быть меньше даты начала');
        }
    }
}