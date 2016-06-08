<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->messages,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'subject',
        'content:ntext',
        'time',
        'readed',
        [
                'attribute' => 'userDetail.id',
                'label' => 'Id To'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'message'
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
