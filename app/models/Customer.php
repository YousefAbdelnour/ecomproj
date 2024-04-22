<?php

namespace app\models;

use PDO;

class Customer extends \app\core\Model
{
    public $CustomerId;
    public $Username;
    public $Password_Hash;
    public $IsActive;

    public function insert()
    {
        $SQL = 'INSERT INTO Customer (Username, Password_Hash, IsActive) VALUES (:username, :password_hash, :is_active)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'username' => $this->Username,
            'password_hash' => $this->Password_Hash,
            'is_active' => $this->IsActive
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Customer';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getByUsername()
    {
        $SQL = 'SELECT * FROM Customer WHERE Username = :username';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['username' => $this->Username]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Customer WHERE CustomerId = :customer_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customer_id' => $this->CustomerId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getActiveCustomers()
    {
        $SQL = 'SELECT * FROM Customer WHERE IsActive = 1';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getInactiveCustomers()
    {
        $SQL = 'SELECT * FROM Customer WHERE IsActive = 0';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function update()
    {
        $SQL = 'UPDATE Customer SET Username = :username, Password_Hash = :password_hash, IsActive = :is_active WHERE CustomerId = :customer_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'username' => $this->Username,
            'password_hash' => $this->Password_Hash,
            'is_active' => $this->IsActive,
            'customer_id' => $this->CustomerId
        ]);
    }

    public function delete()
    {
        $SQL = 'UPDATE Customer SET IsActive = 0 WHERE CustomerId = :customer_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['customer_id' => $this->CustomerId];
        $STMT->execute($data);
    }
}
