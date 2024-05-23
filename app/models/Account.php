<?php

namespace app\models;

use PDO;

class Account extends \app\core\Model
{
    public $AccountId;
    public $Username;
    public $Password_Hash;
    public $IsActive;
    public $IsAdmin;
    public $secret;

    public function add2FA()
    {
        $SQL = 'UPDATE Account SET secret = :secret WHERE AccountId = :account_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['account_id' => $this->AccountId, 'secret' => $this->secret]);
    }

    public function updatePassword()
    {
        $SQL = 'UPDATE Account SET Password_Hash = :password_hash WHERE Username = :username';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'password_hash' => $this->Password_Hash,
            'username' => $this->Username
        ]);
    }
    public function insert()
    {
        $SQL = 'INSERT INTO Account (Username, Password_Hash, IsActive, IsAdmin) VALUES (:username, :password_hash, :is_active, :is_admin)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'username' => $this->Username,
            'password_hash' => $this->Password_Hash,
            'is_active' => $this->IsActive,
            'is_admin' => $this->IsAdmin
        ];
        $STMT->execute($data);
    }
    public function getAll()
    {
        $SQL = 'SELECT * FROM Account';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }
    public function getByUsername($username)
    {
        $SQL = 'SELECT * FROM Account WHERE Username = :username';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['username' => $username]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }
    public function getById()
    {
        $SQL = 'SELECT * FROM Account WHERE AccountId = :id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['id' => $this->AccountId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }
    public function getActiveAccounts()
    {
        $SQL = 'SELECT * FROM Account WHERE IsActive = 0';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }
    public function getInactiveAccounts()
    {
        $SQL = 'SELECT * FROM Account WHERE IsActive = 1';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }
    public function getAdminAccounts()
    {
        $SQL = 'SELECT * FROM Account WHERE IsAdmin = 1';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }
    public function getStaffAccounts()
    {
        $SQL = 'SELECT * FROM Account WHERE IsAdmin = 0 AND IsActive = 0';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }
    public function getCustomerAccounts()
    {
        $SQL = 'SELECT * FROM Customer';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Customer');
        return $STMT->fetchAll();
    }
    public function update()
    {
        $SQL = 'UPDATE Account SET Username = :Username, Password_Hash = :Password_Hash, IsActive = :IsActive, IsAdmin = :IsAdmin WHERE AccountId = :AccountId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'Username' => $this->Username,
            'Password_Hash' => $this->Password_Hash,
            'IsActive' => $this->IsActive,
            'IsAdmin' => $this->IsAdmin,
            'AccountId' => $this->AccountId
        ]);
    }
    public function delete()
    {
        $SQL = 'UPDATE Account SET IsActive = :IsActive WHERE AccountId = :AccountId';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['AccountId' => $this->AccountId, 'IsActive' => 1];
        $STMT->execute($data);
    }
    public function getRelatedAccountsForStaff($staffId)
    {
        $SQL = 'SELECT cu.CustomerId, cu.Username 
        FROM Customer cu
        INNER JOIN Customer_Profile cp ON cu.CustomerId = cp.CustomerId
        INNER JOIN Address ad ON cp.Customer_ProfileId = ad.Customer_ProfileId
        INNER JOIN Job j ON ad.AddressId = j.AddressId
        INNER JOIN Account_Job aj ON j.JobId = aj.JobId
        WHERE aj.AccountId = :maidid'; // Also include all admin accounts

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['maidid' => $staffId]); // Use 'maidid' instead of 'staffId'
        return $STMT->fetchAll(PDO::FETCH_OBJ); // Fetch as associative array
    }

}
