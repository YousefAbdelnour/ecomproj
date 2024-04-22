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

    public function insert()
    {
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
