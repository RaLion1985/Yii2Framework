<?php
/**
 * @var $model \app\models\Activity
 */
?>
<h2>Создание события</h2>
<?php
    $form =\yii\bootstrap\ActiveForm::begin([])?>
<!-- Alias -->
<!-- <?=Yii::getAlias('@app');?><br>
<?=Yii::getAlias('@webroot');?><br>
<?=Yii::getAlias('@images_path');?> -->

    <?=$form ->field($model,'title');?>
    <?=$form ->field($model,'description')->textarea();?>
    <?=$form ->field($model,'eventPriority');?>
    <?=$form ->field($model,'dateStart')->input('date');?>
    <?=$form ->field($model,'dateEnd')->input('date');?>
    <?=$form->field($model,'isBlocked')->checkbox();?>
    <div class="form-group">
         <button class="btn btn-default" type="submit">Создать</button>
    </div>
<?php \yii\bootstrap\ActiveForm::end()?>