<?php

use yii\db\Migration;

class m160524_102826_auth_rule extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%auth_rule}}', [
            'name' => $this->string(64)->notNull(),
            'data' =>  $this->string(),
            'created_at' =>  $this->integer(11),
            'updated_at' =>  $this->integer(11),
        
        ], $tableOptions);
        
        $this->addPrimaryKey(
            'auth_rule_primary',
            'auth_rule',
            ['name']
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_rule}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
