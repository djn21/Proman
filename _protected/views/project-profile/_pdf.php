<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectProfile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project-User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-profile-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project Profile'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'project.name',
                'label' => 'Project'
        ],
        [
                'attribute' => 'profile.name',
                'label' => 'User'
        ],
        'role',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
