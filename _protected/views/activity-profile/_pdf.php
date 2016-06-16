<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ActivityProfile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Activity-User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-profile-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Activity-User:'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'activity.name',
                'label' => 'Activity'
        ],
        [
                'attribute' => 'profile.name',
                'label' => 'User'
        ],
        'time',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
