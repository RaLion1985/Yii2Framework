<?php


namespace app\models;


use yii\base\Model;

class Test extends Model
{
    public $content;
    public $title;

    public function rules()
    {
        return [
            [['title', 'content'], 'required']];
    }

}