<?php

use app\models\Users;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '角色权限');
$this->params['breadcrumbs'][] = $this->title;

// 权限
$current_user = Users::currentUser();
$can_create = $current_user->hasPrivilege('/role/create');
$can_view = $current_user->hasPrivilege('/role/view');
$can_update = $current_user->hasPrivilege('/role/update');
?>
<div class="role-index">

    <?= $this->render('_search', [
        'model' => $searchModel,
    ]); ?>

    <?php if ($can_create) { ?>
    <div class="btn-toolbar list-toolbar pull-right hidden-sm hidden-xs">
        <?= Html::a(
            '<i class="fa fa-plus"></i> ' . Yii::t('app', '创建角色权限'),
            ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </div>
    <?php } ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}\n{summary}",
        'columns' => [
            'name',
            [
                'attribute' => 'status',
                'label' => Yii::t('app', '状态'),
                'value' => function ($model) {
                    return $model->status_string();
                }
            ],
            'description',
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
