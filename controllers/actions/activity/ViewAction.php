<?php


namespace app\controllers\actions\activity;


use app\models\Activity;
use yii\base\Action;
use yii\web\HttpException;

class ViewAction extends Action
{
    public function run($id)
    {
      $model= Activity::find()->andWhere(['id'=>$id])->one();
      if (!$model) {
          throw new HttpException(404,'Activity not found');
      }
      if (!\Yii::$app->rbac->canEditViewActivity($model)){
          throw new HttpException(403,'Activity not for you');
      }
      return $this->controller->render('view',['model'=>$model]);
    }
}