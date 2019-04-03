<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '用户';
$this->params['breadcrumbs'][] = $this->title;
$currentUser                   = \app\models\User::currentUser();
$canView                       = $currentUser->hasPrivilege('创建用户');
$canUpdate                     = $currentUser->hasPrivilege('修改用户');
$canDelete                     = $currentUser->hasPrivilege('删除用户');
?>
<div class="users-index">

    <div class="form-horizontal">
        <div class="form-inline">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <div class="form-horizontal pull-right">
            <p>
                <?= Html::a(Yii::t('app', '创建用户'), ['create'], ['class' => 'btn btn-success pull-righ']) ?>
            </p>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'       => "{items}\n{pager}\n{summary}",
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_code',
            'name',
            'phone',
            'email',
            'province',
            'city',
            'address',
            'post_code',
            [
                'attribute' => 'category',
                'value'     => function ($dataProvider) {
                    return $dataProvider->category()[$dataProvider->category];
                },
            ],
            [
                'attribute' => 'status',
                'value'     => function ($dataProvider) {
                    return $dataProvider->status()[$dataProvider->status];
                },
            ],
            [
                'attribute' => '用户角色',
                'value'     => function ($model) {
                    return $model->getUserRole();
                },
            ],
            [
                'attribute' => 'create_user_id',
                'value'     => function ($dataProvider) {
                    return $dataProvider->getCreateUserName();
                },
            ],
            [
                'attribute' => 'update_user_id',
                'value'     => function ($dataProvider) {
                    return $dataProvider->getupdateUserName();
                },
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
