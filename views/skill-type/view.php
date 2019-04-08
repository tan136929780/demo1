<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SkillType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '职能'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="skill-type-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'desc',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status()[$model->status];
                }
            ],
        ],
    ]) ?>

</div>
