<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\models\ActivityCalendar;
use yii\base\Action;

class CalendarAction extends Action
{
    public $classEntity;


    public function run()
    {
        /**
         * @var ActivityComponent
         */
        $activityComponent=\Yii::createObject(['class'=>ActivityComponent::class,
            'classEntity'=>ActivityCalendar::class
        ]);
        /** @var Activity $activity */
        //$activity = \Yii::$app->activity->getEntity();
        $activity = $activityComponent->getEntity();
        if (\Yii::$app->request->isPost){
            $activity->load(\Yii::$app->request->post());
            if(\Yii::$app->activity->createActivity($activity))
            {
                return $this->controller->redirect('/');
            }
        }


        return $this->controller->render('calendar',['model'=>$activity]);
    }
}