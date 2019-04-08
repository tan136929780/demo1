<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SkillType */

$this->title = Yii::t('app', '更新职能: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '职能'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="skill-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
