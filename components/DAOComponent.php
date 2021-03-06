<?php


namespace app\components;


use yii\db\Connection;
use yii\db\Exception;
use yii\db\Query;

class DAOComponent
{
    private function getConnection(): Connection
    {
        return \Yii::$app->db;
    }

    public function getUsers()
    {
        $sql = 'select * from users';

        return $this->getConnection()->createCommand($sql)->queryAll();
    }

    public function getActivitiesUser($user_id)
    {
        $sql = 'select * from activity where user_id=:user';
        return $this->getConnection()->createCommand($sql, [':user' => $user_id])->queryAll();
    }

    public function getFirstActivity()
    {
        $query = new Query();
        return $query->from('activity')
            ->orderBy(['id' => "SORT_DESC"])
            ->select(['id', 'title'])
            ->andWhere(['useNotification' => 1])
            ->limit(3)
            //->createCommand()->rawSql;
            ->one($this->getConnection());
    }

    public function getCountActivity()
    {
        $query = new Query();
        return $query->from('activity')
            ->select('count(id)')
            ->scalar($this->getConnection());
    }

    public function transactionTest()
    {
        $this->getConnection()->transaction(function () {
            $this->getConnection()->createCommand()->insert('activity', [
                'title' => 'title ' . mt_rand(100, 1000),
                'user_id' => 1,
                'dateStart' => date('Y - m - d')
            ])
                ->execute();
            //    throw new Exception('Break');
            $this->getConnection()->createCommand()->insert('activity', [
                'title' => 'title ' . mt_rand(100, 1000),
                'user_id' => 1,
                'dateStart' => date('Y - m - d')
            ])
                ->execute();
        });
    }

    public function getActivitiesReader()
    {
        $query = new Query();
        return $query->from('activity')->createCommand()->query();

    }

    /*
    $transaction = $this->getConnection()->beginTransaction();
    try {

        $transaction->commit();
    } catch (\Exception $e) {
        $transaction->rollBack();
    }*/
}
