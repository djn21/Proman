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
            <h2><?= 'Project:'.' '. Html::encode($this->title) ?></h2>
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
if($providerProjectProfile->totalCount){
    $gridColumnProjectProfile = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'profile.name',
                'label' => 'User'
        ],
            'role',
            [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProjectProfile,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-project-profile']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Users'),
        ],
        'columns' => $gridColumnProjectProfile
    ]);
}
?>
    </div>

    <div class="row">
<?php
if($providerTask->totalCount){
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Tasks'),
        ],
        'columns' => $gridColumnTask
    ]);
}
?>
    </div>

    <div class="row">
<?php
if($providerIncome->totalCount){
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Incomes'),
        ],
        'columns' => $gridColumnIncome
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerExpence->totalCount){
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Expences'),
        ],
        'columns' => $gridColumnExpence
    ]);
}
?>
    </div>
    
</div>