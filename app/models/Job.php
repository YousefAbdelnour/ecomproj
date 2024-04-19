<?php

namespace app\models;

use PDO;

class Job extends \app\core\Model
{
    public $JobId;
    public $AddressId;
    public $Time_Of_Job;
    public $Status;
    public $House_Size;
    public $Spots_Left;

    public function create()
    {
        $SQL = 'INSERT INTO Job (AddressId, Time_Of_Job, Status, House_Size, Spots_Left) VALUES (:AddressId, :Time_Of_Job, :Status, :House_Size, :Spots_Left)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'AddressId' => $this->AddressId,
            'Time_Of_Job' => $this->Time_Of_Job,
            'Status' => $this->Status ?? 0,
            'House_Size' => $this->House_Size,
            'Spots_Left' => $this->Spots_Left
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Job';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Job');
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Job WHERE JobId = :JobId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['JobId' => $this->JobId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Job');
        return $STMT->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Job SET AddressId = :AddressId, Time_Of_Job = :Time_Of_Job, Status = :Status, House_Size = :House_Size, Spots_Left = :Spots_Left WHERE JobId = :JobId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'JobId' => $this->JobId,
            'AddressId' => $this->AddressId,
            'Time_Of_Job' => $this->Time_Of_Job,
            'Status' => $this->Status,
            'House_Size' => $this->House_Size,
            'Spots_Left' => $this->Spots_Left
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Job WHERE JobId = :JobId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['JobId' => $this->JobId]);
    }
}
