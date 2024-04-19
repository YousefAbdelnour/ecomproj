<?php

namespace app\models;

use PDO;

class Message extends \app\core\Model
{
    public $MessageId;
    public $Sender_AccountId;
    public $Reciever_AccountId;
    public $Message_Text;
    public $Title;
    public $TimeStamp;

    public function create()
    {
        $SQL = 'INSERT INTO Message (Sender_AccountId, Reciever_AccountId, Message_Text, Title, TimeStamp) VALUES (:Sender_AccountId, :Reciever_AccountId, :Message_Text, :Title, CURRENT_TIMESTAMP)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'Sender_AccountId' => $this->Sender_AccountId,
            'Reciever_AccountId' => $this->Reciever_AccountId,
            'Message_Text' => $this->Message_Text,
            'Title' => $this->Title,
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Message';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Message');
        return $STMT->fetchAll();
    }

    public function getById()
    {
        $SQL = 'SELECT * FROM Message WHERE MessageId = :MessageId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['MessageId' => $this->MessageId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Message');
        return $STMT->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Message SET Sender_AccountId = :Sender_AccountId, Reciever_AccountId = :Reciever_AccountId, Message_Text = :Message_Text, Title = :Title WHERE MessageId = :MessageId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'MessageId' => $this->MessageId,
            'Sender_AccountId' => $this->Sender_AccountId,
            'Reciever_AccountId' => $this->Reciever_AccountId,
            'Message_Text' => $this->Message_Text,
            'Title' => $this->Title,
        ]);
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Message WHERE MessageId = :MessageId';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['MessageId' => $this->MessageId]);
    }
}
