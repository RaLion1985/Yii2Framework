<?php
/**
 * @var $this \yii\web\View
 * @var $users array
 * @var $activity array
 */
?>

<div class="row">
    <div class="col-md-6">
        <pre><?php
            print_r($users);
            ?>

        </pre>
    </div>
    <div class="col-md-6">
        <pre><?php
            print_r($activity);
            ?>

        </pre>
    </div>
    <div class="col-md-6">
        <pre><?php
            print_r($act);
            ?>

        </pre>
    </div>
    <div class="col-md-6">
        <pre>Count = <?php
            print_r($count);
            ?>

        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?php foreach ($activity as $item) {
                print_r($item);
            }
            ?>
        </pre>
    </div>
</div>



