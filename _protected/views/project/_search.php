<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'start_date')->textInput(['maxlength' => true, 'placeholder' => 'Start Date']) ?>

    <?= $form->field($model, 'end_date')->textInput(['maxlength' => true, 'placeholder' => 'End Date']) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) ?>

    <?php /* echo $form->field($model, 'dead_line')->textInput(['maxlength' => true, 'placeholder' => 'Dead Line']) */ ?>

    <?php /* echo $form->field($model, 'note')->textInput(['maxlength' => true, 'placeholder' => 'Note']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
