<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserDetail */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
