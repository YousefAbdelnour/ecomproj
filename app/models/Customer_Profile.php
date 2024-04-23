<?php

namespace app\models;

use PDO;

class Customer_Profile extends \app\core\Model
{
    public $Customer_ProfileId;
    public $Name;
    public $Phone_Number;
    public $CustomerId;

    public function insert()
    {
        $SQL = 'INSERT INTO Customer_Profile (Name, Phone_Number, CustomerId) 
                VALUES (:name, :phone_number, :customer_id)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'name' => $this->Name,
            'phone_number' => $this->Phone_Number,
            'customer_id' => $this->CustomerId
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Customer_Profile';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Customer_Profile WHERE Customer_ProfileId = :customer_profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customer_profile_id' => $this->Customer_ProfileId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getByCustomerId($customer_id)
    {
        $SQL = 'SELECT * FROM Customer_Profile WHERE CustomerId = :customer_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customer_id' => $customer_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Customer_Profile SET Name = :name, Phone_Number = :phone_number, CustomerId = :customer_id 
                WHERE Customer_ProfileId = :customer_profile_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'name' => $this->Name,
            'phone_number' => $this->Phone_Number,
            'customer_id' => $this->CustomerId,
            'customer_profile_id' => $this->Customer_ProfileId
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Customer_Profile WHERE Customer_ProfileId = :customer_profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['customer_profile_id' => $this->Customer_ProfileId];
        $STMT->execute($data);
    }
}
