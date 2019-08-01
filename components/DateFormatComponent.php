<?php


namespace app\components;


class DateFormatComponent
{
    public $format;
    public function getFormat(){
        return $format = 'php:d-m-Y';
    }

}