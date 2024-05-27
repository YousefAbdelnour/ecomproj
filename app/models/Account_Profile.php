<?php

namespace app\models;

use PDO;

class Account_Profile extends \app\core\Model
{
    public $ProfileId;
    public $Name;
    public $Phone_Number;
    public $AccountId;

    public function insert()
    {
        $SQL = 'INSERT INTO Account_Profile (Name, Phone_Number, AccountId) VALUES (:name, :phone_number, :account_id)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'name' => $this->Name,
            'phone_number' => $this->Phone_Number,
            'account_id' => $this->AccountId
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Account_Profile';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Account_Profile WHERE ProfileId = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['profile_id' => $this->ProfileId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getByAccountId()
    {
        $SQL = 'SELECT * FROM Account_Profile WHERE AccountId = :account_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['account_id' => $this->AccountId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }
    #[\app\filters\AuthenticateAccount]
    public function update()
    {
        $SQL = 'UPDATE Account_Profile SET Name = :name, Phone_Number = :phone_number, AccountId = :account_id WHERE ProfileId = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'name' => $this->Name,
            'phone_number' => $this->Phone_Number,
            'account_id' => $this->AccountId,
            'profile_id' => $this->ProfileId
        ]);
    }
    #[\app\filters\AuthenticateAccount]
    public function delete()
    {
        $SQL = 'DELETE FROM Account_Profile WHERE ProfileId = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['profile_id' => $this->ProfileId];
        $STMT->execute($data);
    }
}
