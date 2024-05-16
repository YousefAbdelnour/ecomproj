<?php

namespace app\models;

use PDO;

class Message extends \app\core\Model
{
    public $MessageId;
    public $SenderId;
    public $SenderType;
    public $ReceiverId;
    public $ReceiverType;
    public $Message_Text;
    public $Title;
    public $TimeStamp;
    public $SenderUsername;

    public function send_message()
{
    // Check if ReceiverId is set and is a valid integer
    if (!isset($this->ReceiverId) || !filter_var($this->ReceiverId, FILTER_VALIDATE_INT)) {
        echo 'ReceiverId is not set or is not a valid integer';
        return;
    }

    // Set current date and time
    $this->TimeStamp = date('Y-m-d H:i:s');

    // Prepare SQL query
    $SQL = 'INSERT INTO Message (SenderId, Sender_Type, ReceiverId, Receiver_Type, Message_Text, Title, TimeStamp) 
        VALUES (:sender_id, :sender_type, :receiver_id, :receiver_type, :message_text, :title, :timestamp)';

    // Prepare and execute SQL statement
    $STMT = self::$_conn->prepare($SQL);
    $data = [
        'sender_id' => $this->SenderId,
        'sender_type' => $this->SenderType,
        'receiver_id' => $this->ReceiverId,
        'receiver_type' => $this->ReceiverType,
        'message_text' => $this->Message_Text,
        'title' => $this->Title,
        'timestamp' => $this->TimeStamp
    ];

    // Debugging output
    var_dump($data); // Remove this line after debugging

    if ($STMT->execute($data)) {
        echo 'Message sent successfully';
    } else {
        echo 'Failed to send message';
    }
}

    




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
        $SQL = 'SELECT * FROM Message WHERE SenderId = :sender_id AND Sender_Type = :sender_type';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['sender_id' => $this->SenderId, 'sender_type' => $this->SenderType]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $STMT->fetchAll();
    }

    public function getByReceiverId()
    {
        $SQL = 'SELECT MessageId, SenderId, Sender_Type AS SenderType, ReceiverId, Receiver_Type AS ReceiverType, Message_Text, Title, TimeStamp FROM Message WHERE ReceiverId = :receiver_id AND Receiver_Type = :receiver_type';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['receiver_id' => $this->ReceiverId, 'receiver_type' => $this->ReceiverType]);
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
        $SQL = 'UPDATE Message SET SenderId = :sender_id, Sender_Type = :sender_type, ReceiverId = :receiver_id, Receiver_Type = :receiver_type, Message_Text = :message_text, 
                Title = :title, TimeStamp = :timestamp WHERE MessageId = :message_id';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'sender_id' => $this->SenderId,
            'sender_type' => $this->SenderType,
            'receiver_id' => $this->ReceiverId,
            'receiver_type' => $this->ReceiverType,
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
