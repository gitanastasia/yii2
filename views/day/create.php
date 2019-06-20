<?php

/**
 * @var $model Day
 */

use app\models\Day;
use yii\bootstrap\ActiveForm; ?>

<h2>Make your day!</h2>

<div class="row">
    <div class="col-md-6">
        <?php $form= ActiveForm::begin(); ?>
        <?=$form->field($model,'title');?>
        <?=$form->field($model,'description')->textarea();?>

        <?=$form->field($model,'working')->checkbox();?>
        <?=$form->field($model,'weekend')->checkbox();?>

        <div class="form-group">
            <a href="<?['label' => 'Activity', 'url' => ['/activity/create']]?>">Редактировать событие</a>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
