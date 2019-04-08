<?php

use yii\db\Migration;

/**
 * Class m190402_054635_table_resource_management
 */
class m190402_054635_table_resource_management extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('resource_management', [
            'id'         => $this->primaryKey(),
            'user_name'  => $this->string(50) . 'Not null default 0 comment "用户名"',
            'user_code'  => $this->string(20) . 'Not null default 0 comment "用户ID"',
            'type'       => $this->integer(2) . 'Not null default 0 comment "用户类型，内部/顾问"',
            'level'      => $this->string(11) . 'Not null default 0 comment "用户级别"',
            'skill'      => $this->string(11) . 'Not null default 0 comment "用户职能"',
            'status'     => $this->integer(2) . 'Not null default 1 comment "状态"',
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);
    }

    public function down()
    {
        $this->dropTable('resource_management');
    }
}
