
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Календарь';
?>
<h1><?= Html::encode($this->title) ?></h1>



<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'dateCalendar')->input('text'); ?>
<?php ActiveForm::end(); ?>
