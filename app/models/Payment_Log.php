<?php

namespace app\models;

use PDO;

class Payment_Log extends \app\core\Model
{
    public $Payment_Id;
    public $AccountId;
    public $Confirmation_Number;
    public $Time_Stamp;

    public function create()
    {
        $SQL = 'INSERT INTO Payment_Log (AccountId, Confirmation_Number, Time_Stamp) VALUES (:AccountId, :Confirmation_Number, CURRENT_TIMESTAMP)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'AccountId' => $this->AccountId,
            'Confirmation_Number' => $this->Confirmation_Number,
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Payment_Log';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Payment_Log');
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Payment_Log WHERE Payment_Id = :Payment_Id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['Payment_Id' => $this->Payment_Id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Payment_Log');
        return $STMT->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Payment_Log SET AccountId = :AccountId, Confirmation_Number = :Confirmation_Number WHERE Payment_Id = :Payment_Id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'Payment_Id' => $this->Payment_Id,
            'AccountId' => $this->AccountId,
            'Confirmation_Number' => $this->Confirmation_Number,
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Payment_Log WHERE Payment_Id = :Payment_Id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['Payment_Id' => $this->Payment_Id]);
    }
}
