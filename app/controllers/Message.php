<?php

namespace app\controllers;

class Message extends \app\core\Controller
{
    public function index()
    {
        
        $messageModel = new \app\models\Message();
        $messages = $messageModel->getAll();
        $this->view('message/index', ['messages' => $messages]);
    }

    public function create()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if required fields are set in $_POST
        if (isset($_POST['receiver'], $_POST['title'], $_POST['dsc'])) {
            // Get the customerId from the session
            $customerId = $_SESSION['CustomerId'];

            $message = new \app\models\Message();
            // Set senderId to customerId
            $message->SenderId = $customerId;
            $message->ReceiverId = $_POST['receiver'];
            $message->Message_Text = $_POST['dsc'];
            $message->Title = $_POST['title'];
            // No need to set TimeStamp manually, let the database handle it
            $message->send_message();

            // Redirect after sending the message
            header('Location: /message/index');
            exit;
        } else {
            // Handle case where required fields are missing
            echo "Required fields are missing.";
            // You can redirect or display an error message here
        }
    }

    // Load the view for creating a message
    $this->view('message/create');
}



   


    public function show($id)
    {
        
        $messageModel = new \app\models\Message();
        $message = $messageModel->getById($id);
        $this->view('message/show', ['message' => $message]);
    }

    public function edit($id)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $message = new \app\models\Message();
            $message->MessageId = $id;
            $message->SenderId = $_POST['sender_id'];
            $message->ReceiverId = $_POST['receiver_id'];
            $message->Message_Text = $_POST['message_text'];
            $message->Title = $_POST['title'];
            $message->TimeStamp = date('Y-m-d H:i:s'); 
            $message->update();

            
            header('Location: /message/show/' . $id);
            exit;
        }

      
        $messageModel = new \app\models\Message();
        $message = $messageModel->getById($id);
        $this->view('message/edit', ['message' => $message]);
    }

    public function delete($id)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $message = new \app\models\Message();
            $message->MessageId = $id;
            $message->delete();

            
            header('Location: /message/index');
            exit;
        }

        
        $this->view('message/delete', ['id' => $id]);
    }
}
