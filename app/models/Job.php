<?php

namespace app\models;

use PDO;
use PDOException;

class Job extends \app\core\Model
{
    public $JobId;
    public $AddressId;
    public $Time_Of_Job;
    public $Status;
    public $Spots_Left;
    public $Description;
    public $MaidId;

    public function insert()
    {
        $SQL = 'INSERT INTO Job (AddressId, Time_Of_Job, Status,  Spots_Left, Description, MaidId) 
            VALUES (:address_id, :time_of_job, :status, :spots_left, :description, :maid_id)';
        $STMT = self::$_conn->prepare($SQL);
        // Convert empty string for MaidId to null
        $maidId = $this->MaidId !== '' ? $this->MaidId : null;
        $data = [
            'address_id' => $this->AddressId,
            'time_of_job' => $this->Time_Of_Job,
            'status' => $this->Status,
            'spots_left' => $this->Spots_Left,
            'description' => $this->Description,
            'maid_id' => $maidId  // Use the converted value
        ];
        // Execute the statement and handle possible errors
        try {
            $STMT->execute($data);
        } catch (PDOException $e) {
            // Handle exception (e.g., log to file, display error message)
            throw new \Exception("Error inserting job: " . $e->getMessage());
        }
    }

    public function getMaidsForJob()
    {
        $SQL = 'SELECT Account.* 
                FROM Account 
                JOIN Account_Job ON Account.AccountId = Account_Job.AccountId 
                WHERE Account_Job.JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['job_id' => $this->JobId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Account');
        return $STMT->fetchAll();
    }

    public function getAddressById()
    {
        $SQL = 'SELECT * FROM Address WHERE AddressId = :address_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['address_id' => $this->AddressId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Address');
        return $STMT->fetch();
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Job';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getJobsByStatus()
    {
        $SQL = 'SELECT * FROM Job WHERE Status = :status';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['status' => $this->Status]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Job WHERE JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['job_id' => $this->JobId]);
        $STMT->setFetchMode(PDO::FETCH_INTO, $this);
        return $STMT->fetch();
    }

    public function getByAddressId()
    {
        $SQL = 'SELECT * FROM Job WHERE AddressId = :address_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['address_id' => $this->AddressId]);
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
                Spots_Left = :spots_left, Description = :description, MaidId = :maid_id 
                WHERE JobId = :job_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'address_id' => $this->AddressId,
            'time_of_job' => $this->Time_Of_Job,
            'status' => $this->Status,
            'spots_left' => $this->Spots_Left,
            'description' => $this->Description,
            'maid_id' => $this->MaidId,
            'job_id' => $this->JobId
        ]);
    }

    public function getJobsbyCustomer($CustomerId)
    {
        $SQL = 'SELECT * FROM Job WHERE AddressId = 
                            (SELECT AddressId FROM Address WHERE Customer_ProfileId = 
                            (SELECT Customer_ProfileId FROM Customer_Profile WHERE CustomerId = :CustomerId))';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['CustomerId' => $CustomerId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $STMT->fetchAll();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Job WHERE JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['job_id' => $this->JobId];
        $STMT->execute($data);
    }
    //NOT FUNCTIONAL
    //Getting all jobs by CustomerProfileId connected to it 
    public function getAllByCustomerProfileId($customer_profile_id)
    {
        $SQL = 'SELECT Job.* 
            FROM Job 
            INNER JOIN Address ON Job.AddressId = Address.AddressId 
            WHERE Address.Customer_ProfileId = :customer_profile_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customer_profile_id' => $customer_profile_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $STMT->fetchAll();
    }

    public function getMaidsByJob()
    {
        $SQL = 'SELECT A.* FROM Account A 
                INNER JOIN Account_Job AJ ON A.AccountId = AJ.AccountId
                WHERE AJ.JobId = :job_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['job_id' => $this->JobId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Account');
        return $STMT->fetchAll();
    }

    public function getJobsByStatusAndProfileId($customer_profile_id, $status)
    {
        $SQL = 'SELECT Job.* 
                FROM Job 
                JOIN Address ON Job.AddressId = Address.AddressId 
                WHERE Address.Customer_ProfileId = :customer_profile_id AND Job.Status = :status';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'customer_profile_id' => $customer_profile_id,
            'status' => $status
        ]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $STMT->fetchAll();
    }
}
