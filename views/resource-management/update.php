<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResourceManagement */

$this->title = Yii::t('app', '更新人员信息: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '人力资源管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="resource-management-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
