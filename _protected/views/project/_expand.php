<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Project'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Users'),
        'content' => $this->render('_dataProjectProfile', [
            'model' => $model,
            'row' => $model->projectProfiles,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Tasks'),
        'content' => $this->render('_dataTask', [
            'model' => $model,
            'row' => $model->tasks,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Incomes'),
        'content' => $this->render('_dataIncome', [
            'model' => $model,
            'row' => $model->incomes,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Expences'),
        'content' => $this->render('_dataExpence', [
            'model' => $model,
            'row' => $model->expences,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
        //        'height' => TabsX::SIZE_TINY
    ],
    'pluginEvents' => [
        "tabsX.click" => "function(e) {setTimeout(function(e){
                if ($('.nav-tabs > .active').next('li').length == 0) {
                    $('#prev').show();
                    $('#next').hide();
                } else if($('.nav-tabs > .active').prev('li').length == 0){
                    $('#next').show();
                    $('#prev').hide();
                }else{
                    $('#next').show();
                    $('#prev').show();
                };
                console.log(JSON.stringify($('.active', '.nav-tabs').html()));
            },10)}",
    ],
]);
?>
