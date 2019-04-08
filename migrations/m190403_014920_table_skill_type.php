<?php

use yii\db\Migration;

/**
 * Class m190403_014920_table_skill_type
 */
class m190403_014920_table_skill_type extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('skill_type', [
            'id'         => $this->primaryKey(),
            'name'       => $this->string(50) . 'Not null default "" comment "职位名称"',
            'desc'       => $this->string(255) . 'Not null default "" comment "职位描述"',
            'status'     => $this->integer(2) . 'Not null default 1 comment "状态"',
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);
    }

    public function down()
    {
        $this->dropTable('skill_type');
    }
}
