<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ProductCategory;

?>
<h1>Сущность День</h1>

<?php
$form =\yii\bootstrap\ActiveForm::begin([])?>
<?=$form ->field($model,'titleEvent');?>

<?=$form->field($model, 'typeOfDay')->dropdownList(
['Рабочий','Выходной']);?>

<!--<?=$form ->field($model,'typeOfDay');?>-->
<?php \yii\bootstrap\ActiveForm::end()?>
