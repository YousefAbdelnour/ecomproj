<?php

namespace app\controllers;

class Message extends \app\core\Controller
{
    #[\app\filters\AuthenticateCustomer]
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
                $message->SenderType = 1; // 1 for customer
                $message->ReceiverId = $_POST['receiver'];
                $message->ReceiverType = 0; // Assuming staff or admin are always type 0
                $message->Message_Text = $_POST['dsc'];
                $message->Title = $_POST['title'];
                $message->send_message();

                header('Location: /Customer/home');
                exit;
            }
        }

        $messageModel = new \app\models\Message();
        $relatedAccounts = $messageModel->getRelatedAccounts($_SESSION['CustomerId']);

        $this->view('message/support', [
            'relatedAccounts' => $relatedAccounts
        ]);
    }




    #[\app\filters\AuthenticateAccount]
    public function sendMessageFromAccount($selectedReceiver = null, $receiverType = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['receiverId'], $_POST['receiverType'], $_POST['title'], $_POST['dsc'])) {
                $accountId = $_SESSION['AccountId'];
                $receiverId = $_POST['receiverId'];
                $receiverType = $_POST['receiverType'];

                $message = new \app\models\Message();
                $message->SenderId = $accountId;
                $message->SenderType = 0; // 0 for staff or admin
                $message->ReceiverId = $receiverId;
                $message->ReceiverType = $receiverType; // 0 for account, 1 for customer

                $message->Message_Text = $_POST['dsc'];
                $message->Title = $_POST['title'];

                // Send the message
                $message->send_message();
                header('location:/Account/display/1');
                exit;
            }
        }

        $selectedReceiver = $_POST['receiver'] ?? $selectedReceiver;

        $accountModel = new \app\models\Account();
        $customerModel = new \app\models\Customer();

        if ($_SESSION['isAdmin']) {
            // Admin can get all accounts and customers
            $relatedAccounts = $accountModel->getAll();
            $customers = $customerModel->getAll();
        } else {
            // Staff can only get related accounts
            $relatedAccounts = $accountModel->getAdminAccounts();
            $customers = $accountModel->getRelatedAccountsForStaff($_SESSION['AccountId']);
        }

        $this->view('message/sendFromAccount', [
            'relatedAccounts' => $relatedAccounts,
            'customers' => $customers,
            'selectedReceiver' => $selectedReceiver,
            'receiverType' => $receiverType,
        ]);
    }










    #[\app\filters\AuthenticateAccount]
    public function receivedAccount()
    {
        $accountId = $_SESSION['AccountId'];

        $messageModel = new \app\models\Message();
        $messageModel->ReceiverId = $accountId;
        $messageModel->ReceiverType = 0; // 0 for staff or admin
        $messages = $messageModel->getByReceiverId();

        $accountModel = new \app\models\Account();
        $customerModel = new \app\models\Customer();

        foreach ($messages as $message) {
            if ($message->SenderType == 0) { // 0 for staff or admin
                $accountModel->AccountId = $message->SenderId;
                $sender = $accountModel->getById();
                $message->SenderUsername = $sender ? $sender->Username : 'Unknown';
            } else { // 1 for customer
                $customerModel->CustomerId = $message->SenderId;
                $sender = $customerModel->getById();
                $message->SenderUsername = $sender ? $sender->Username : 'Unknown';
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
        $messageModel->ReceiverType = 1; // 1 for customer
        $messages = $messageModel->getByReceiverId();

        $accountModel = new \app\models\Account();
        $customerModel = new \app\models\Customer();

        foreach ($messages as $message) {
            if ($message->SenderType == 0) { // 0 for staff or admin
                $accountModel->AccountId = $message->SenderId;
                $sender = $accountModel->getById();
                $message->SenderUsername = $sender ? $sender->Username : 'Unknown';
            } else { // 1 for customer
                $customerModel->CustomerId = $message->SenderId;
                $sender = $customerModel->getById();
                $message->SenderUsername = $sender ? $sender->Username : 'Unknown';
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
