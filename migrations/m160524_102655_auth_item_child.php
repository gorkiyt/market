<?php

use yii\db\Migration;

class m160524_102655_auth_item_child extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string(64)->notNull(),
            'child' =>  $this->string(64)->notNull(),
        
        ], $tableOptions);

        $this->addPrimaryKey(
            'auth_item_child_primary',
            'auth_item_child',
            ['parent','child']
        );

        $this->addForeignKey(
            'auth_item_child_ibfk_1',
            'auth_item_child',
            'parent',
            'auth_item',
            'name',
            'CASCADE'
        );
         $this->addForeignKey(
            'auth_item_child_ibfk_2',
            'auth_item_child',
            'child',
            'auth_item',
            'name',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_item_child}}');
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