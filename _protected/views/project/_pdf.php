<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'name',
        'start_date',
        'end_date',
        'dead_line',
        'status',
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
    $gridColumnExpence = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'description',
        'amount',
        'date',
        [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerExpence,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-expence']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Expence'.' '. $this->title),
        ],
        'columns' => $gridColumnExpence
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIncome = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'description',
        'amount',
        'date',
        [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIncome,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-income']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Income'.' '. $this->title),
        ],
        'columns' => $gridColumnIncome
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnProjectUser = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
        [
                'attribute' => 'userDetail.id',
                'label' => 'User'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProjectUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-project-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Project User'.' '. $this->title),
        ],
        'columns' => $gridColumnProjectUser
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnTask = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'name',
        'start_date',
        'end_date',
        'dead_line',
        'man_hours',
        'percentage',
        'note:ntext',
        [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTask,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-task']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Task'.' '. $this->title),
        ],
        'columns' => $gridColumnTask
    ]);
?>
    </div>
</div>
