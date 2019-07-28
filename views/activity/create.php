<?php
/**
 * @var $model \app\models\Activity
 */
?>
    <h2>Создание события</h2>
<?php
$form = \yii\bootstrap\ActiveForm::begin([]) ?>
    <!-- Alias -->
    <!-- <?= Yii::getAlias('@app'); ?><br>
<?= Yii::getAlias('@webroot'); ?><br>
<?= Yii::getAlias('@images_path'); ?> -->

<?= $form->field($model, 'title'); ?>
<?= $form->field($model, 'description')->textarea(); ?>
<?= $form->field($model, 'eventPriority'); ?>
<?= $form->field($model, 'dateStart')->input('date'); ?>
<?= $form->field($model, 'dateEnd')->input('text'); ?>
<?= $form->field($model, 'isIterated')->checkbox(); ?>
<?= $form->field($model,'iteratedType')->dropDownList($model::REPEAT_TYPE);?>

<?= $form->field($model, 'isBlocked')->checkbox(); ?>

<?= $form->field($model, 'useNotification')->checkbox(); ?>
<?= $form->field($model, 'email', ['enableAjaxValidation' => true,
    'enableClientValidation' => false]); ?>
<?= $form->field($model,'emailRepeat');?>

<?=$form->field($model,'image')->fileInput();?>
    <div class="form-group">
        <button class="btn btn-default" type="submit">Создать</button>
    </div>
<?php \yii\bootstrap\ActiveForm::end() ?>