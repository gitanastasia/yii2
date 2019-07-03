<?php
//подключение asset
\app\widgets\dao\assets\DaoAsset::register($this)
?>

 <div class="col-md-6">
     <h3>From widget</h3>
        <pre>
            <?=print_r($users);?>
        </pre>
    </div>