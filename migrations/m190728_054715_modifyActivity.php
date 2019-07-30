<?php

use yii\db\Migration;

/**
 * Class m190728_054715_modifyActivity
 */
class m190728_054715_modifyActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'eventPriority', $this->string(150));
        $this->addColumn('activity', 'isIterated', $this->tinyInteger()->notNull()->defaultValue(0));
        $this->addColumn('activity', 'iteratedType', $this->integer());
        $this->addColumn('activity','image',$this->string(300));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','eventPriority');
        $this->dropColumn('activity','isIterated');
        $this->dropColumn('activity','iteratedType');
        $this->dropColumn('activity','image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190728_054715_modifyActivity cannot be reverted.\n";

        return false;
    }
    */
}
