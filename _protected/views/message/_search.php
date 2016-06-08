<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'placeholder' => 'Subject']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true, 'placeholder' => 'Time']) ?>

    <?= $form->field($model, 'readed')->checkbox() ?>

    <?php /* echo $form->field($model, 'id_from')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\UserDetail::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Proman user detail'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'id_to')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\UserDetail::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Proman user detail'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
