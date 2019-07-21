<?php


namespace app\controllers;

use app\models\Test;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Test();
        $model->title = "Задача";
        $model->content = "Постановка задачи";
        //var_dump($model);
        //echo "Задача";
        /*return $this->render('test', [
            'title' => 'Задача',
            'content' => 'Постановка задачи'

        ]);*/
       /* var_dump($model->validate());
        exit();*/
        return $this->render('test',[
            'model' => $model,
        ]);
    }
    public function actionTaskdesc(){
        $model = new Test();
        $model->title = "Описание задачи";
        $model->content = "Описание пунктов подзадач";
        return $this->render('test',[
            'model' => $model,
        ]);
    }
}