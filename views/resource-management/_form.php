<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResourceManagement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resource-management-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '人员姓名'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'user_name', ['class' => 'form-control user-name']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', 'IT Code'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'user_code', ['class' => 'form-control user-code']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '类型'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'type', $model->type(), ['class' => 'form-control type']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '级别'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'level', $model->level(), ['class' => 'form-control level']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '职能'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'skill', $model->skill(), ['class' => 'form-control skill']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '状态'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeRadioList($model, 'status', $model->status(), ['class' => 'form-control status']) ?>
            </div>
        </div>
    </div>
    <div class="form-group col-lg-offset-3">
        <?= Html::submitButton(Yii::t('app', '保存'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
