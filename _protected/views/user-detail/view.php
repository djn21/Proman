<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\UserDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-detail-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'User Detail'.' '. Html::encode($this->title) ?></h2>
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
        ['attribute' => 'id', 'hidden' => true],
        'first_name',
        'last_name',
        'phone',
        'role',
        'note',
        'image',
        [
            'attribute' => 'user.id',
            'label' => 'User',
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
if($providerMessage->totalCount){
    $gridColumnMessage = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            'subject',
            'content:ntext',
            'time',
            'readed',
            [
                'attribute' => 'userDetail.id',
                'label' => 'Id From'
        ],
            [
                'attribute' => 'userDetail.id',
                'label' => 'Id To'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMessage,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-proman-message']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Message'.' '. $this->title),
        ],
        'columns' => $gridColumnMessage
    ]);
}
?>
    </div>
</div>