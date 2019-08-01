<?php

use yii\db\Migration;


/**
 * Class m190730_141915_passwords
 */
class m190730_141915_passwords extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $password_hash=\yii::$app->security->generatePasswordHash('123456');
        $authKey= \Yii::$app->security->generateRandomString();
        $this->update('users',array('password_hash'=> $password_hash, 'auth_key'=>$authKey),'id=1');

        $password_hash=\yii::$app->security->generatePasswordHash('123456');
        $authKey= \Yii::$app->security->generateRandomString();
        $this->update('users',array('password_hash'=> $password_hash, 'auth_key'=>$authKey),'id=2');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->update('users',array('password_hash'=> 'adfaadf', 'auth_key'=> null),'id=1');
        $this->update('users',array('password_hash'=> 'adfaadf', 'auth_key'=> null),'id=2');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190730_141915_passwords cannot be reverted.\n";

        return false;
    }
    */
}
