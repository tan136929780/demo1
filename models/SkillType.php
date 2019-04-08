<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_type".
 *
 * @property int $id
 * @property string $name 职位名称
 * @property string $desc 职位描述
 * @property int $status 状态
 * @property int $updated_at
 * @property int $created_at
 */
class SkillType extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skill_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'updated_at', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '职位名称'),
            'desc' => Yii::t('app', '职位描述'),
            'status' => Yii::t('app', '状态'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
