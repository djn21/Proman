<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-user-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true, 'placeholder' => 'Role']) ?>

    <?php /* echo $form->field($model, 'note')->textInput(['maxlength' => true, 'placeholder' => 'Note']) */ ?>

    <?php /* echo $form->field($model, 'image')->textInput(['maxlength' => true, 'placeholder' => 'Image']) */ ?>

    <?php /* echo $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Proman user'],
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
