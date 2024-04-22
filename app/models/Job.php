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
    public $Description;
    public $MaidId;

    public function insert()
    {
        $SQL = 'INSERT INTO Job (AddressId, Time_Of_Job, Status, House_Size, Spots_Left, Description, MaidId) 
                VALUES (:address_id, :time_of_job, :status, :house_size, :spots_left, :description, :maid_id)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'address_id' => $this->AddressId,
            'time_of_job' => $this->Time_Of_Job,
            'status' => $this->Status,
            'house_size' => $this->House_Size,
            'spots_left' => $this->Spots_Left,
            'description' => $this->Description,
            'maid_id' => $this->MaidId
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Job';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Job WHERE JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['job_id' => $this->JobId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getByMaidId()
    {
        $SQL = 'SELECT * FROM Job WHERE MaidId = :maid_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['maid_id' => $this->MaidId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function update()
    {
        $SQL = 'UPDATE Job SET AddressId = :address_id, Time_Of_Job = :time_of_job, Status = :status, 
                House_Size = :house_size, Spots_Left = :spots_left, Description = :description, MaidId = :maid_id 
                WHERE JobId = :job_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'address_id' => $this->AddressId,
            'time_of_job' => $this->Time_Of_Job,
            'status' => $this->Status,
            'house_size' => $this->House_Size,
            'spots_left' => $this->Spots_Left,
            'description' => $this->Description,
            'maid_id' => $this->MaidId,
            'job_id' => $this->JobId
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Job WHERE JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['job_id' => $this->JobId];
        $STMT->execute($data);
    }
}