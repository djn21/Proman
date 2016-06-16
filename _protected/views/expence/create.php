<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Expence */

$this->title = 'Create Expence';
$this->params['breadcrumbs'][] = ['label' => 'Expences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
