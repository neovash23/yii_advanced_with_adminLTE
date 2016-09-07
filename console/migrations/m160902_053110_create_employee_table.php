<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee`.
 */
class m160902_053110_create_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'employee_no' => $this->string(12)->notNull()->unique(),
            'email' => $this->string(50)->unique(),
            'profile_id' => $this->integer(11)->notNull(),
            'job_id' => $this->integer(11)->notNull(),
            'company_id' => $this->integer(11)->notNull(),
            'spouse_id' => $this->integer(11),
            'eci_id' => $this->integer(11),
            'union_id' => $this->integer(11),
            'status' => $this->integer(2),
            'department_id' => $this->integer(11),
            'remarks' => $this->text(),
            'hire_date' => $this->date(),
            'start_date' => $this->date(),
            'exit_date' => $this->date(),

        ]);

        //create index for profile_id
        $this->createIndex(
            'idx-employee-profile_id',
            'employee',
            'profile_id'
        );

        //create index for job_id
        $this->createIndex(
            'idx-employee-job_id',
            'employee',
            'job_id'
        );

        $this->createIndex(
            'idx-employee-company_id',
            'employee',
            'company_id'
        );

        $this->createIndex(
            'idx-employee-department_id',
            'employee',
            'department_id'
        );

        $this->createIndex(
            'idx-employee-spouse_id',
            'employee',
            'spouse_id'
        );

        $this->createIndex(
            'idx-employee-eci_id',
            'employee',
            'eci_id'
        );

        $this->createIndex(
            'idx-employee-union_id',
            'employee',
            'union_id'
        );
  

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-employee-profile_id',
            'employee',
            'profile_id',
            'profile',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('employee');
    }
}
