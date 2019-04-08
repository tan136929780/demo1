<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResourceManagement */

$this->title = Yii::t('app', '创建人员信息');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '人力资源管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resource-management-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
