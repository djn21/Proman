<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Nenad Zivkovic <nenad@freetuts.org>
 * 
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
        'css/bootstrap.min.css',
		'css/AdminLTE.min.css',
		'css/skins/_all-skins.min.css',
		'plugins/iCheck/flat/blue.css',
		'css/style.css',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
    ];

    public $js = [
		'js/bootstrap.min.js',
		'plugins/sparkline/jquery.sparkline.min.js',
		'plugins/slimScroll/jquery.slimscroll.min.js',
		'plugins/fastclick/fastclick.js',
		'js/app.min.js',
		'js/dashboard.js',
		'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
		'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
