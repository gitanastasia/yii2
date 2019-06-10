<?php

/**
 * var $model \app\models\Activity
 */

?>

<h2>Добавление события</h2>

<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin(); ?>
        <?=$form->field($model,'title');?>
        <?=$form->field($model,'description')->textarea();?>
        <?=$form->field($model,'startDate')->input('date');?>
        <?=$form->field($model,'endDate')->input('date');?>
        <?=$form->field($model,'isRepeat')->input('date');?>
        <?=$form->field($model,'isBlocked')->checkbox();?>

        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>