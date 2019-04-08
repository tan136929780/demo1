<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SkillType */

$this->title = Yii::t('app', '创建职能');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '职能'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
