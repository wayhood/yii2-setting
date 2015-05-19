<?php
/**
 * @link http://www.wayhood.com/
 */

use yii\db\Schema;

class m140618_045255_create_setting extends \yii\db\Migration
{
    public function up()
    {
        $this->createTable(
            '{{%setting}}',
            [
                'id' => Schema::TYPE_PK,
                'type' => Schema::TYPE_STRING,
                'section' => Schema::TYPE_STRING,
                'key' => Schema::TYPE_STRING,
                'value' => Schema::TYPE_TEXT,
                'active' => Schema::TYPE_BOOLEAN,
                'created_at' => Schema::TYPE_INTEGER.' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER.' NOT NULL'
            ]
        );
    }

    public function down()
    {
        echo "m140618_045255_create_setting cannot be reverted.\n";

        return false;
    }
}
