<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcemanagementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resource-management-search form-inline">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline']
    ]); ?>

    <div class="form-group">
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'user_name', ['class' => 'form-control user-name', 'placeholder' => Yii::t('app', '人员姓名')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'user_code', ['class' => 'form-control user-code', 'placeholder' => Yii::t('app', 'IT Code')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'type', $model->type(), ['class' => 'form-control type', 'prompt' => Yii::t('app', '人员类型')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'level', $model->level(), ['class' => 'form-control level', 'prompt' => Yii::t('app', '人员级别')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'skill', $model->skill(), ['class' => 'form-control skill', 'prompt' => Yii::t('app', '人员职能')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'status', $model->status(), ['class' => 'form-control status', 'prompt' => Yii::t('app', '状态')]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '搜索'), ['class' => 'btn btn-primary left-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
