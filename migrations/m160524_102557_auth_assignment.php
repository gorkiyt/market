<?php

use yii\db\Migration;

class m160524_102557_auth_assignment extends Migration
{
    public function up()
    {
      $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->string(64)->notNull(),
            'created_at' => $this->integer(11),
        
        ], $tableOptions);

        $this->addPrimaryKey(
            'auth_assignment_primary',
            'auth_assignment',
            ['item_name','user_id']
        );

        $this->addForeignKey(
            'auth_assignment_ibfk_1',
            'auth_assignment',
            'item_name',
            'auth_item',
            'name',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_assignment}}');
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
