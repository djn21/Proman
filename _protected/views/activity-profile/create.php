<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActivityProfile */

$this->title = 'Create Activity-User';
$this->params['breadcrumbs'][] = ['label' => 'Activity-User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
