<?php
/**
 * @var $model \app\models\Activity
 */
?>
<h1><?=$model->title?></h1>

<div><img src="/images/<?=$model->img?>"</div>

<div><?=$model->description?></div>

<h6>Дата начала: <?=$model->startDate?></h6>
<h6>Дата окончания: <?=$model->endDate?></h6>
