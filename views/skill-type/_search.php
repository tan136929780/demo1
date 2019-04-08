<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SkillTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-type-search form-inline">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group">
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'name', ['class' => 'form-control name', 'placeholder' => Yii::t('app', '职能')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeInput('input', $model, 'desc', ['class' => 'form-control desc', 'placeholder' => Yii::t('app', '描述')]) ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <?= Html::activeDropDownList($model, 'status', $model->status(), ['class' => 'form-control status', 'prompt' => Yii::t('app', '状态')]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
