<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', Yii::$app->name);
$this->params['breadcrumbs'][] = 'About';
?>
<div class="site-about">
    <h1><?= Html::encode('About') ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
