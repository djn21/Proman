<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expence */

$this->title = 'Update Expence: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
