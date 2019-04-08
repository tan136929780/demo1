<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SkillTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', '职位');
$this->params['breadcrumbs'][] = $this->title;
$currentUser                   = \app\models\User::currentUser();
$canCreate                     = $currentUser->hasPrivilege('创建职位');
$canUpdate                     = $currentUser->hasPrivilege('更新职位');
$canDelete                     = $currentUser->hasPrivilege('删除职位');
?>
<div class="skill-type-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '创建职位'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'       => "{items}\n{pager}\n{summary}",
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'desc',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status()[$model->status];
                }
            ],
            [
                'header' => Yii::t('app', '操作'),
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => '查看',
                            'aria-label' => '查看',
                            'data-pjax' => '0',
                            'class' => 'btn btn-default  btn-sm',
                        ];
                        return Html::a(Yii::t('app', '查看'), $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('app', '编辑'),
                            'aria-label' => Yii::t('app', '编辑'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-default  btn-sm',
                        ];
                        return Html::a(Yii::t('app', '编辑'), $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            $url,
                            [
                                'class' => 'btn btn-danger  btn-sm',
                                'title' => Yii::t('app', '删除'),
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('app', '确定删除吗?')
                            ]
                        );
                    }
                ],
            ],
        ],
    ]); ?>
</div>
