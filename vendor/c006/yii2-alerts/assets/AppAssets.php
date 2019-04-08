<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/24/14
 * Time: 11:47 AM
 */
namespace c006\alerts\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class AppAssets
 *
 * @package c006\alerts\assets
 */
class AppAssets extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/c006/yii2-alerts/assets';
    //public $sourcePath = 'https://s3-ap-southeast-1.amazonaws.com/mds-prd/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        ASSET_SERVER . 'css/alert/c006-alerts.css'
    ];

    /**
     * @inheritdoc
     */
    public $js = [];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * @var array
     */
    public $jsOptions = [
        'position' => View::POS_END,
    ];

}
