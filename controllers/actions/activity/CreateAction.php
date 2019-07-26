<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class CreateAction extends Action
{
    public $classEntity;


    public function run()
    {
        /**
         * @var ActivityComponent
         */
        $activityComponent=\Yii::createObject(['class'=>ActivityComponent::class,
    'classEntity'=>Activity::class
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


        return $this->controller->render('create',['model'=>$activity]);
    }
}