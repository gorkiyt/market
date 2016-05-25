<?php

use yii\db\Migration;

class m160523_184300_market extends Migration
{
    public function up()
    {
    $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

         $this->createTable('{{%market}}', [
            'id' => $this->primaryKey(),
            'filename' => $this->string(255)->notNull(),
            'barkod_no' => $this->integer()->notNull(),
            'urun_adi' => $this->string(33)->notNull(),
            'urun_kategori' => $this->string(33)->notNull(),
            'urun_adet' => $this->integer()->notNull(),

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%market}}');
        
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
