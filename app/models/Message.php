<?php

namespace app\models;

use PDO;

class Message extends \app\core\Model
{
    public $MessageId;
    public $SenderId;
    public $ReceiverId;
    public $Message_Text;
    public $Title;
    public $TimeStamp;
    public $SenderUsername;

    public function send_message()
{
    $this->TimeStamp = date('Y-m-d H:i:s'); // Set current date and time
        $SQL = 'INSERT INTO Message (SenderId, ReceiverId, Message_Text, Title, TimeStamp) 
                VALUES (:sender_id, :receiver_id, :message_text, :title, :timestamp)';

        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'sender_id' => $this->SenderId,
            'receiver_id' => $this->ReceiverId,
            'message_text' => $this->Message_Text,
            'title' => $this->Title,
            'timestamp' => $this->TimeStamp
        ];
        $STMT->execute($data);
    }



    //Through an absolute cluster-fuck subquery I'm grabbing 
    //which account are related to the user so that in the drop 
    //down menu all the accounts with relationships are accessible
    public function getRelatedAccounts($customerId)
    {
    $SQL = 'SELECT a.AccountId, a.Username 
            FROM Account a
            INNER JOIN Account_Job aj ON a.AccountId = aj.AccountId
            INNER JOIN Job j ON aj.JobId = j.JobId
            INNER JOIN Address ad ON j.AddressId = ad.AddressId
            INNER JOIN Customer_Profile cp ON ad.Customer_ProfileId = cp.Customer_ProfileId
            WHERE cp.CustomerId = :customerId

            UNION

            SELECT AccountId, Username
            FROM Account
            WHERE AccountId = 1'; // Assuming admin's AccountId is always 1

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customerId' => $customerId]);
        return $STMT->fetchAll(PDO::FETCH_OBJ); // Fetch as associative array
    }



    public function getAll()
    {
        $SQL = 'SELECT * FROM Message';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Message WHERE MessageId = :message_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['message_id' => $this->MessageId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetch();
    }

    public function getBySenderId()
    {
        $SQL = 'SELECT * FROM Message WHERE SenderId = :sender_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['sender_id' => $this->SenderId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getByReceiverId()
    {
        $SQL = 'SELECT * FROM Message WHERE ReceiverId = :receiver_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['receiver_id' => $this->ReceiverId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getByTitle($title)
    {
        $SQL = 'SELECT * FROM Message WHERE Title LIKE :title';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['title' => "%$title%"]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function update()
    {
    $this->TimeStamp = date('Y-m-d H:i:s'); // Update current date and time
    $SQL = 'UPDATE Message SET SenderId = :sender_id, ReceiverId = :receiver_id, Message_Text = :message_text, 
            Title = :title, TimeStamp = :timestamp WHERE MessageId = :message_id';

    $STMT = self::$_conn->prepare($SQL);
    $STMT->execute([
        'sender_id' => $this->SenderId,
        'receiver_id' => $this->ReceiverId,
        'message_text' => $this->Message_Text,
        'title' => $this->Title,
        'timestamp' => $this->TimeStamp,
        'message_id' => $this->MessageId
    ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Message WHERE MessageId = :message_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['message_id' => $this->MessageId];
        $STMT->execute($data);
    }
}
