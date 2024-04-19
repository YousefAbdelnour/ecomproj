<?php

namespace app\models;

use PDO;

class Account extends \app\core\Model
{
    public $AccountId;
    public $Username;
    public $Password_Hash;
    public $Status;

    public function create()
    {
        $SQL = 'INSERT INTO Account (Username, Password_Hash, Status) VALUES (:Username, :Password_Hash, :Status)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'Username' => $this->Username,
            'Password_Hash' => $this->Password_Hash,
            'Status' => $this->Status
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Account';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Account');
        return $STMT->fetchAll();
    }

    public function getById($id)
    {
        $SQL = 'SELECT * FROM Account WHERE AccountId = :AccountId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['AccountId' => $id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Account');
        return $STMT->fetch();
    }

    public function getAllMaids()
    {
        return $this->getByStatus(1);
    }

    public function getAllCustomers()
    {
        return $this->getByStatus(2);
    }

    public function getAllAdmins()
    {
        return $this->getByStatus(0);
    }

    private function getByStatus($status)
    {
        $SQL = 'SELECT * FROM Account WHERE Status = :Status';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['Status' => $status]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Account');
        return $STMT->fetchAll();
    }

    public function update()
    {
        $SQL = 'UPDATE Account SET Username = :Username, Password_Hash = :Password_Hash, Status = :Status WHERE AccountId = :AccountId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'AccountId' => $this->AccountId,
            'Username' => $this->Username,
            'Password_Hash' => $this->Password_Hash,
            'Status' => $this->Status
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Account WHERE AccountId = :AccountId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['AccountId' => $this->AccountId]);
    }
}
