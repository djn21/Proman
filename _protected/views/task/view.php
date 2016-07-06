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
            <h2><?= 'Task:'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'project.name',
            'label' => 'Project',
        ],
        'name',
        'start_date',
        'end_date',
        'dead_line',
        'man_hours',
        'percentage',
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
if($providerTaskProfile->totalCount){
    $gridColumnTaskProfile = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'profile.name',
                'label' => 'User'
        ],
            'role',
            [
                'attribute' => 'task.name',
                'label' => 'Task'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTaskProfile,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-task-profile']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Users'),
        ],
        'columns' => $gridColumnTaskProfile
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerActivity->totalCount){
    $gridColumnActivity = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            'name',
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Activities'),
        ],
        'columns' => $gridColumnActivity
    ]);
}
?>
    </div>
   
</div>