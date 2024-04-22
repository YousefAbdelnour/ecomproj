<?php

namespace app\models;

use PDO;

class Payment_Log extends \app\core\Model
{
    public $Payment_Id;
    public $AccountId;
    public $CustomerId;
    public $Confirmation_Number;
    public $Time_Stamp;

    public function insert()
    {
        $SQL = 'INSERT INTO Payment_Log (AccountId, CustomerId, Confirmation_Number, Time_Stamp) 
                VALUES (:account_id, :customer_id, :confirmation_number, :time_stamp)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'account_id' => $this->AccountId,
            'customer_id' => $this->CustomerId,
            'confirmation_number' => $this->Confirmation_Number,
            'time_stamp' => $this->Time_Stamp
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Payment_Log';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Payment_Log WHERE Payment_Id = :payment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['payment_id' => $this->Payment_Id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getByAccountId()
    {
        $SQL = 'SELECT * FROM Payment_Log WHERE AccountId = :account_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['account_id' => $this->AccountId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getByCustomerId()
    {
        $SQL = 'SELECT * FROM Payment_Log WHERE CustomerId = :customer_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customer_id' => $this->CustomerId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getByConfirmationNumber()
    {
        $SQL = 'SELECT * FROM Payment_Log WHERE Confirmation_Number = :confirmation_number';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['confirmation_number' => $this->Confirmation_Number]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getSortedByTimestamp()
    {
        $SQL = 'SELECT * FROM Payment_Log ORDER BY Time_Stamp DESC';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function update()
    {
        $SQL = 'UPDATE Payment_Log SET AccountId = :account_id, CustomerId = :customer_id, 
                Confirmation_Number = :confirmation_number, Time_Stamp = :time_stamp WHERE Payment_Id = :payment_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'account_id' => $this->AccountId,
            'customer_id' => $this->CustomerId,
            'confirmation_number' => $this->Confirmation_Number,
            'time_stamp' => $this->Time_Stamp,
            'payment_id' => $this->Payment_Id
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Payment_Log WHERE Payment_Id = :payment_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['payment_id' => $this->Payment_Id];
        $STMT->execute($data);
    }
}
