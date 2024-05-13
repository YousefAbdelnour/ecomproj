<?php

namespace app\models;

use PDO;

class Account_Job extends \app\core\Model
{
    public $AccountId;
    public $JobId;

    function insert()
    {
        $SQL = 'INSERT INTO Account_Job (AccountId, JobId) VALUES (:account_id, :job_id)';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute([
            'account_id' => $this->AccountId,
            'job_id' => $this->JobId
        ]);
    }

    function getAllByAccountId()
    {
        $SQL = 'SELECT * FROM Account_Job WHERE AccountId = :account_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['account_id' => $this->AccountId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Account_Job');
        return $STMT->fetchAll();
    }

    function deleteByAccountId()
    {
        $SQL = 'DELETE FROM Account_Job WHERE AccountId = :account_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['account_id' => $this->AccountId]);
    }

    function deleteByJobId()
    {
        $SQL = 'DELETE FROM Account_Job WHERE JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['job_id' => $this->JobId]);
    }
}
