<?php

namespace app\models;

use PDO;

class Profile extends \app\core\Model
{
    public $ProfileId;
    public $AccountId;
    public $Name;
    public $Phone_Number;

    public function create()
    {
        $SQL = 'INSERT INTO Profile (AccountId, Name, Phone_Number) VALUES (:AccountId, :Name, :Phone_Number)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'AccountId' => $this->AccountId,
            'Name' => $this->Name,
            'Phone_Number' => $this->Phone_Number
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Profile';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Profile WHERE ProfileId = :ProfileId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['ProfileId' => $this->ProfileId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
        return $STMT->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Profile SET AccountId = :AccountId, Name = :Name, Phone_Number = :Phone_Number WHERE ProfileId = :ProfileId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'ProfileId' => $this->ProfileId,
            'AccountId' => $this->AccountId,
            'Name' => $this->Name,
            'Phone_Number' => $this->Phone_Number
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Profile WHERE ProfileId = :ProfileId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['ProfileId' => $this->ProfileId]);
    }
}
