<?php

/* @var $this \yii\web\View */

?>

<div class="row">
//кешируем блок
    <?php if ($this->beginCache('page', ['duration'=>10])): ?>
    <?=\app\widgets\dao\DaoWidget::widget(['users' => $users]);?>
    <?php $this->endCache();?>
    <?php endif;?>

    <div class="col-md-6">
        <pre>
            <?=print_r($activityUser);?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?=print_r($firstActivity);?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            Всего активностей: <?=$cnt;?>
        </pre>
    </div>
    <!-- выдача данных идет по частям, хотя запрос был создан один-->
    <div class="col-md-6">
        <pre>
            <?php foreach ($reader as $data):?>
                <?=print_r($data);?>
            <?php endforeach;?>
        </pre>
    </div>
</div>
