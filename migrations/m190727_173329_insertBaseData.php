<?php

use yii\db\Migration;

/**
 * Class m190727_173329_insertBaseData
 */
class m190727_173329_insertBaseData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'id' => '1',
            'email' => 'test1@test.ru',
            'password_hash' => 'adfaadf'
        ]);
        $this->insert('users',    [
                'id' => 2,
                'email' => 'test2@test.ru',
                'password_hash' => 'adfaadf'
            ]);

        $this->batchInsert('activity',['title','user_id','dateStart','useNotification','email'],[
            ['title 1',1, date('Y-m-D'),0,null],
            ['title 2',2, date('Y-m-D'),0,null],
            ['title 3',2, date('Y-m-D'),1,'test@sd.er'],
            ['title 4',2, date('Y-m-D'),1,'test@sd.er'],
            ['title 4',1, '2019-07-20',1,'test@sd.er'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->delete('users');
        $this->delete('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190727_173329_insertBaseData cannot be reverted.\n";

        return false;
    }
    */
}
