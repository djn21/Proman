<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Activity:'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'task.name',
            'label' => 'Task'
        ],
        'name',
        'note:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnActivityProfile = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'profile.name',
                'label' => 'User'
        ],
        'time',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerActivityProfile,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-activity-profile']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Users'),
        ],
        'columns' => $gridColumnActivityProfile
    ]);
?>
    </div>
</div>
