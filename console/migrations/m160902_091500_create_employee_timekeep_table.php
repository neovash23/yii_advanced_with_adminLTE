<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee_timekeep`.
 */
class m160902_091500_create_employee_timekeep_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('employee_timekeep', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('employee_timekeep');
    }
}
