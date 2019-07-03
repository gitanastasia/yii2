<?php


namespace app\widgets\dao\assets;


use app\assets\AppAsset;
use yii\web\AssetBundle;

class DaoAsset extends AssetBundle
{
    public $sourcePath='@app/widgets/dao/source';
    public $js=[
        'js/dao.js'
    ];
    public $depends=[
      AppAsset::class
  ];

}