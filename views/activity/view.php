<?php
/** @var \app\models\Activity $model ...
 *
 */
?>
<p>Заголовок <strong><?=$model->title?></strong></p>

<!--<?=\yii\helpers\Html::button('val',['class'=>''])?>-->


<!--<img src="/images/<?=$model->image?>" alt="Image" width="50%">-->
<? foreach($model->image as $item) :?>
<?=\yii\helpers\Html::img('/images/'.$item,['width'=>150]);?> <br>
<? endforeach; ?>
