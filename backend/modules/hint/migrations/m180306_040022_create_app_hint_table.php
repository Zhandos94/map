<?php

namespace backend\modules\hint\migrations;

use yii\db\Migration;

class m180306_040022_create_app_hint_table extends Migration
{
    public function up()
    {
        $this->createTable('app_hint', [
            'id' => $this->primaryKey(),
            'page_name' => $this->string(50)->notNull(),
            'element_id' => $this->string(50)->notNull(),
            'message' => $this->string()->notNull(),
            'step' => $this->smallInteger()->notNull(),
            'position' => $this->string(10)->defaultValue('bottom'),
            'created_at' => $this->timestamp(),
        ], 'ENGINE=InnoDB, COLLATE=utf8_general_ci');

        $this->batchInsert('app_hint', ['page_name', 'element_id', 'message', 'step', 'position', 'created_at'], [
            ['/hint/test/test', 'stepOne', 'This is a stepOne!', '1', 'bottom', '2018-03-07 11:39:41'],
            ['/hint/test/test', 'stepTwo', 'This is a stepTwo!', '2', 'left', '2018-03-07 11:39:41'],
            ['/hint/test/test', 'stepThree', 'This is a stepThree!', '3', 'right', '2018-03-07 11:39:41'],
            ['/hint/test/test', 'stepFour', 'This is a stepFour!', '4', 'bottom', '2018-03-07 11:39:41'],
            ['/hint/test/test', 'stepFive', 'This is a stepFive!', '5', 'bottom', '2018-03-07 11:39:41']
        ]);


    }

    public function down()
    {
        $this->dropTable('app_hint');
    }
}