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

    #[\app\filters\AuthenticateCustomer]
    public function support()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['receiver'], $_POST['title'], $_POST['dsc'])) {
                $customerId = $_SESSION['CustomerId'];

                $message = new \app\models\Message();
                $message->SenderId = $customerId;
                $message->ReceiverId = $_POST['receiver'];
                $message->Message_Text = $_POST['dsc'];
                $message->Title = $_POST['title'];
                $message->send_message();

                header('Location: /Customer/home');
                exit;
            } else {
                $error = "Required fields are missing.";
            }
        }

        $messageModel = new \app\models\Message();
        $relatedAccounts = $messageModel->getRelatedAccounts($_SESSION['CustomerId']);

        $selectedReceiver = $_POST['receiverId'] ?? null;

        $this->view('Message/support', [
            'relatedAccounts' => $relatedAccounts,
            'selectedReceiver' => $selectedReceiver,
            'error' => $error ?? null
        ]);
    }


    #[\app\filters\AuthenticateAccount]
    public function sendMessageFromAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['receiver'], $_POST['title'], $_POST['dsc'])) {
                $accountId = $_SESSION['AccountId'];

                $message = new \app\models\Message();
                $message->SenderId = $accountId;
                $message->ReceiverId = $_POST['receiver'];
                $message->Message_Text = $_POST['dsc'];
                $message->Title = $_POST['title'];
                $message->send_message();

                header('location:/Account/display/1');
                exit;
            } else {
                $error = "Required fields are missing.";
            }

            $selectedReceiver = $_POST['receiverId'] ?? null;
        } else {
            $selectedReceiver = $_POST['receiverId'] ?? null;
        }

        $accountModel = new \app\models\Account();
        if ($_SESSION['isAdmin']) {
            $relatedAccounts = $accountModel->getAll(); // Admins can message all accounts
        } else {
            $relatedAccounts = $accountModel->getRelatedAccountsForStaff($_SESSION['AccountId']);
        }

        $this->view('Message/sendFromAccount', [
            'relatedAccounts' => $relatedAccounts,
            'selectedReceiver' => $selectedReceiver,
            'error' => $error ?? null
        ]);
    }



    #[\app\filters\AuthenticateAccount]
    public function receivedAccount()
    {
        $accountId = $_SESSION['AccountId'];

        $messageModel = new \app\models\Message();
        $messageModel->ReceiverId = $accountId;
        $messages = $messageModel->getByReceiverId();

        // Initialize models
        $accountModel = new \app\models\Account();
        $customerModel = new \app\models\Customer();

        // Fetch sender usernames and determine the type
        foreach ($messages as $message) {
            $accountModel->AccountId = $message->SenderId;
            $senderAccount = $accountModel->getById();

            // Attempt to fetch sender details from customers
            $customerModel->CustomerId = $message->SenderId;
            $senderCustomer = $customerModel->getById();

            if ($senderAccount) {
                $message->SenderUsername = $senderAccount->Username;
                $message->SenderType = 'account';
            } elseif ($senderCustomer) {
                $message->SenderUsername = $senderCustomer->Username;
                $message->SenderType = 'customer';
            } else {
                $message->SenderUsername = 'Unknown';
                $message->SenderType = 'unknown'; // Fallback scenario
            }
        }

        $this->view('message/receivedAccount', ['messages' => $messages]);
    }


    #[\app\filters\AuthenticateCustomer]
    public function receivedByCustomer()
    {
        $customerId = $_SESSION['CustomerId'];

        $messageModel = new \app\models\Message();
        $messageModel->ReceiverId = $customerId;
        $messages = $messageModel->getByReceiverId();

        // Initialize models to determine sender type
        $accountModel = new \app\models\Account();
        $customerModel = new \app\models\Customer();

        foreach ($messages as $message) {
            // Attempt to fetch sender details from accounts
            $accountModel->AccountId = $message->SenderId;
            $senderAccount = $accountModel->getById();

            // Attempt to fetch sender details from customers
            $customerModel->CustomerId = $message->SenderId;
            $senderCustomer = $customerModel->getById();

            if ($senderAccount) {
                $message->SenderUsername = $senderAccount->Username;
                $message->SenderType = 'Account';
            } elseif ($senderCustomer) {
                $message->SenderUsername = $senderCustomer->Username;
                $message->SenderType = 'Customer';
            } else {
                $message->SenderUsername = 'Unknown';
                $message->SenderType = 'Unknown';  // If neither, set as unknown
            }
        }

        $this->view('message/receivedByCustomer', ['messages' => $messages]);
    }




    public function show($id)
    {

        $messageModel = new \app\models\Message();
        $messageModel->MessageId = $id;
        $message = $messageModel->getById();
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
        $messageModel->MessageId = $id;
        $message = $messageModel->getById();
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
