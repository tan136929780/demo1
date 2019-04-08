<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SkillType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '职能'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'name', ['class' => 'form-control name']) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">
                <?= Yii::t('app', '描述'); ?>
            </label>
            <div class="col-sm-3">
                <?= Html::activeTextarea($model, 'desc', ['class' => 'form-control desc', 'style' => 'resize:none']) ?>
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
