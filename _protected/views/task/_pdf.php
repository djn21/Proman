<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Task'.' '. Html::encode($this->title) ?></h2>
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
        'man_hours',
        'percentage',
        'note:ntext',
        [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnActivity = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'description',
        'note:ntext',
        [
                'attribute' => 'task.name',
                'label' => 'Task'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerActivity,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-activity']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Activity'.' '. $this->title),
        ],
        'columns' => $gridColumnActivity
    ]);
?>
    </div>
</div>
