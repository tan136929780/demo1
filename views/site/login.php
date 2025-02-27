<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title                   = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-lg-offset-3">
    <p><?= Yii::t('app', '请填写登录信息：') ?></p>
    <?php $form = ActiveForm::begin([
        'id'          => 'login-form',
        'layout'      => 'horizontal',
        'fieldConfig' => [
            'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'username')
             ->textInput(['autofocus' => true])
             ->label('用户：') ?>
    <?= $form->field($model, 'password')
             ->passwordInput()
             ->label('密码：') ?>
    <?= $form->field($model, 'rememberMe')
             ->checkbox([
                 'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
             ]) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app', '登录'), [
                'class' => 'btn btn-primary',
                'name'  => 'login-button'
            ]) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
