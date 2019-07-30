<?php

use yii\db\Migration;

/**
 * Class m190727_172339_alterTablesIndex
 */
class m190727_172339_alterTablesIndex extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'user_id', $this->integer()->notNull());
        $this->addForeignKey('activityUserFk', 'activity', 'user_id',
            'users', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('emailUserInd', 'users', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity', 'user_id');
        $this->dropForeignKey('activityUserFk', 'activity');
        $this->dropIndex('emailUserInd', 'users');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190727_172339_alterTablesIndex cannot be reverted.\n";

        return false;
    }
    */
}
