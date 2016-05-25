<?php

use yii\db\Migration;

class m160524_102745_auth_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(64)->notNull(),
            'type' => $this->integer(11)->notNull(),
            'description' =>  $this->string(),
            'rule_name' =>  $this->string(64),
            'data' =>  $this->string(),
            'created_at' =>  $this->integer(11),
            'updated_at' =>  $this->integer(11),
        
        ], $tableOptions);

        $this->addPrimaryKey(
            'auth_item_primary',
            'auth_item',
            ['name']
        );

        $this->addForeignKey(
            'auth_item_ibfk_1',
            'auth_item',
            'rule_name',
            'auth_rule',
            'name',
            'CASCADE'
        );
        
    }

    public function down()
    {
        $this->dropTable('{{%auth_item}}');
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
