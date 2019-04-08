<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ResourceManagement */

$this->title = $model->user_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '人力资源管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resource-management-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_name',
            'user_code',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return $model->type()[$model->type];
                }
            ],
            [
                'attribute' => 'level',
                'value' => function($model){
                    return $model->level()[$model->level];
                }
            ],
            [
                'attribute' => 'skill',
                'value' => function($model){
                    return $model->skill()[$model->skill];
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status()[$model->status];
                }
            ],
        ],
    ]) ?>

</div>
