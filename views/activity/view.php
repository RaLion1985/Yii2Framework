<?php
/** @var \app\models\Activity $model ...
 *
 */
?>
<p>Заголовок <strong><?=$model->title?></strong></p>

<!--<?=\yii\helpers\Html::button('val',['class'=>''])?>-->


<!--<img src="/images/<?=$model->image?>" alt="Image" width="50%">-->
<?=\yii\helpers\Html::img('/images/'.$model->image,['width'=>150]);?>