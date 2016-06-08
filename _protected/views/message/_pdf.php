<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Message'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
