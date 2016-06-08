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
                'label' => 'User'
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
            'heading' => Html::encode('Message'.' '. $this->title),
        ],
        'columns' => $gridColumnMessage
    ]);
?>
    </div>
</div>
