<?php

/**
 * @var $model Activity
 */

use app\models\Activity;
use yii\bootstrap\ActiveForm; ?>

<h2>Добавление события</h2>

<div class="row">
    <div class="col-md-6">
        <?php $form= ActiveForm::begin(); ?>
        <?=$form->field($model,'title');?>
        <?=$form->field($model,'description')->textarea();?>
        <?=$form->field($model,'startDate')->input('date');?>
        <?=$form->field($model,'endDate')->input('date');?>
        <?=$form->field($model,'repeatType')->dropDownList($model::REPEAT_TYPE)?>
        <?=$form->field($model,'isRepeat')->input('date');?>
        <?=$form->field($model,'isBlocked')->checkbox();?>
        <?=$form->field($model,'img')->fileInput()?>

        <?=$form->field($model,'useNotification')->checkbox();?>
        <?=$form->field($model,'email',['enableAjaxValidation'=>true,
            'enableClientValidation'=>false])?>,

        <!--<?=$form->field($model,'emailRepeat')?>-->


        <div class="form-group">
            <button type="submit">Отправить</button>
            <button type="reset">Очистить</button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
