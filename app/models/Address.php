<?php

namespace app\models;

use PDO;

class Address extends \app\core\Model
{
    public $AddressId;
    public $ProfileId;
    public $Building_Number;
    public $Street_Name;
    public $ZipCode;
    public $State;
    public $Country;

    public function create()
    {
        $SQL = 'INSERT INTO Address (ProfileId, Building_Number, Street_Name, ZipCode, State, Country) VALUES (:ProfileId, :Building_Number, :Street_Name, :ZipCode, :State, :Country)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'ProfileId' => $this->ProfileId,
            'Building_Number' => $this->Building_Number,
            'Street_Name' => $this->Street_Name,
            'ZipCode' => $this->ZipCode,
            'State' => $this->State,
            'Country' => $this->Country
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Address';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Address');
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Address WHERE AddressId = :AddressId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['AddressId' => $this->AddressId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Address');
        return $STMT->fetch();
    }

    public function getByProfileId()
    {
        $SQL = 'SELECT * FROM Address WHERE ProfileId = :ProfileId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['ProfileId' => $this->ProfileId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Address');
        return $STMT->fetchAll();  
    }

    public function update()
    {
        $SQL = 'UPDATE Address SET ProfileId = :ProfileId, Building_Number = :Building_Number, Street_Name = :Street_Name, ZipCode = :ZipCode, State = :State, Country = :Country WHERE AddressId = :AddressId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'AddressId' => $this->AddressId,
            'ProfileId' => $this->ProfileId,
            'Building_Number' => $this->Building_Number,
            'Street_Name' => $this->Street_Name,
            'ZipCode' => $this->ZipCode,
            'State' => $this->State,
            'Country' => $this->Country
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Address WHERE AddressId = :AddressId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['AddressId' => $this->AddressId]);
    }
}
