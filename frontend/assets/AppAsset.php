<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jqvmap.css',
        //'css/bootstrap.min.css',
        'css/jquery-ui.css',
        'css/style.css?v=9',
        'css/swiper-bundle.min.css',
        'css/media.css?v=9',
        'css/owl.carousel.css',
        'css/fancybox.min.css',
        'css/font-awesome.min.css',
    ];
    public $js = [
        //'js/jquery-3.5.1.min.js',
        'js/swiper-bundle.min.js',
        //'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/jquery-ui.js',
        'js/fancybox.min.js',
        'js/jquery.vmap.js',
        'js/vmap.uzbekistan.js',
        'js/map.js?v=0',
        'js/masonry.pkgd.js',
        'js/imagesLoaded.pkgd.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
