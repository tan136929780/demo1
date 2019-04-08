<?php

namespace app\models;

use app\components\Constant;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "resource_management".
 *
 * @property int $id
 * @property string $user_name 用户名
 * @property string $user_code 用户ID
 * @property int $type 用户类型，内部/顾问
 * @property int $status
 * @property string $level 用户级别
 * @property string $skill 用户职能
 * @property int $updated_at
 * @property int $created_at
 */
class ResourceManagement extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource_management';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'status', 'updated_at', 'created_at'], 'integer'],
            [['user_name'], 'string', 'max' => 50],
            [['user_code'], 'string', 'max' => 20],
            [['level', 'skill'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('app', 'ID'),
            'user_name'  => Yii::t('app', '人员姓名'),
            'user_code'  => Yii::t('app', 'IT Code'),
            'type'       => Yii::t('app', '类型'),
            'level'      => Yii::t('app', '级别'),
            'skill'      => Yii::t('app', '职能'),
            'status'     => Yii::t('app', '状态'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public function type()
    {
        return [
            1 => Yii::t('app', '内部'),
            2 => Yii::t('app', '外部'),
        ];
    }

    public function level()
    {
        return [
            'k1' => Yii::t('app', 'k1'),
            'k2' => Yii::t('app', 'k2'),
        ];
    }

    public function skill()
    {
        $skills = SkillType::findAll(['status' => Constant::TYPE_ACTIVE]);
        $skillArr = ArrayHelper::map($skills, 'name', 'name');
        return $skillArr;
    }
}
