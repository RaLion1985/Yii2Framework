<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;

class DaoController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        /**
         * @var DAOComponent
         */
        $dao = \Yii::$app->dao;

        $dao->transactionTest();
        $user = $dao->getUSers();
        $activity = $dao->getActivitiesUser(\Yii::$app->request->get('user', 1));
        $act = $dao->getFirstActivity();
        $count = $dao->getCountActivity();
        $reader = $dao->getActivitiesReader();
        return $this->render('index', [
            'users' => $user,
            'activity' => $activity,
            'act' => $act,'count'=>$count,
            'reader'=>$reader
        ]);
    }

}