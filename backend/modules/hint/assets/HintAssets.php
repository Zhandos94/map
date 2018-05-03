<?php
/**
 * Created by PhpStorm.
 * User: zh.zhumagali
 * Date: 05.03.2018
 * Time: 16:05
 */

namespace backend\modules\hint\assets;

use yii\web\AssetBundle;

class HintAssets extends AssetBundle
{
    public $sourcePath = '@backend/modules/hint/assets';

    public $css = [
        'css/introjs.css'
    ];

    public $js = [
        'js/intro.js',
        'js/hint.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}