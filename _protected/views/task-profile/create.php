<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskProfile */

$this->title = 'Create Task-User';
$this->params['breadcrumbs'][] = ['label' => 'Task-User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
