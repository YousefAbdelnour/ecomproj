<?php

namespace app\models;

use PDO;

class Address extends \app\core\Model
{
    public $AddressId;
    public $Customer_ProfileId;
    public $Building_Number;
    public $Street_Name;
    public $ZipCode;
    public $State;
    public $Country;

    public function insert()
    {
        $SQL = 'INSERT INTO Address (Customer_ProfileId, Building_Number, Street_Name, ZipCode, State, Country) 
                VALUES (:customer_profile_id, :building_number, :street_name, :zipcode, :state, :country)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'customer_profile_id' => $this->Customer_ProfileId,
            'building_number' => $this->Building_Number,
            'street_name' => $this->Street_Name,
            'zipcode' => $this->ZipCode,
            'state' => $this->State,
            'country' => $this->Country
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Address';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Address WHERE AddressId = :address_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['address_id' => $this->AddressId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getByCustomerProfileId()
    {
        $SQL = 'SELECT * FROM Address WHERE Customer_ProfileId = :customer_profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customer_profile_id' => $this->Customer_ProfileId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function update()
    {
        $SQL = 'UPDATE Address SET Building_Number = :building_number, Street_Name = :street_name, ZipCode = :zipcode, 
                State = :state, Country = :country WHERE AddressId = :address_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'building_number' => $this->Building_Number,
            'street_name' => $this->Street_Name,
            'zipcode' => $this->ZipCode,
            'state' => $this->State,
            'country' => $this->Country,
            'address_id' => $this->AddressId
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Address WHERE AddressId = :address_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['address_id' => $this->AddressId];
        $STMT->execute($data);
    }
}
