<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->userDetails,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'first_name',
        'last_name',
        'phone',
        'role',
        'note',
        'image',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'user-detail'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
