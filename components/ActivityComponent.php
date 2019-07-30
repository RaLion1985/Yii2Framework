<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $classEntity;

    public function init()
    {
        parent::init();
        if (empty($this->classEntity)) {
            throw new \Exception('ClassEntity param required');
        }
    }

    public function getEntity()
    {
        return new $this->classEntity();
    }

    public function createActivity(Activity &$model): bool
    {
       /*$model->image = UploadedFile::getInstance($model, 'image');
        if ($model->validate()) {
            /*if ($model->image && $this->saveUploadedFile($model->image))
            {

            }*/
       /*
            if ($model->image){
                if($file=$this->saveUploadedFile($model->image)){
                    $model->image=$file;
                }
            }


        return true;

        }*/

       // For multiple download
       $model->image = UploadedFile::getInstances($model, 'image');
        if ($model->validate()) {


            if ($model->image) {
                $filesArr=[];
                foreach ($model->image as $item) {
                    if ($image = $this->saveUploadedFile($item)){
                        array_push ($filesArr,$image);
                    }
                }
                $model->image=$filesArr;
            }
            return true;
        }


        return false;
    }

    private function saveUploadedFile(UploadedFile $file): string
    {
        $path = $this->getPathToSaveImage();
        $filename = $this->genFileName($file);
        $path .= DIRECTORY_SEPARATOR . $filename;


        if ($file->saveAs($path)) {
            return $filename;
        } else {
            return null;
        }

    }

    private function getPathToSaveImage()
    {
        $path = \Yii::getAlias('@images_path');
        FileHelper::createDirectory($path);
        return $path;
    }

    private function genFileName(UploadedFile $file)
    {
        return time() . '_' . $file->getBaseName() . '.' . $file->getExtension();

    }

}