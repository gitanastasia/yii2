<?php

/**
 * var $model \app\models\Day
 */

?>

<h2>Ваш день</h2>

<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin(); ?>
        <?=$form->field($model,'title')->input('date');?>
        <?=$form->field($model,'description')->textarea();?>

        <?=$form->field($model,'working')->checkbox();?>
        <?=$form->field($model,'weekend')->checkbox();?>

        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>