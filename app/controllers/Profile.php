<?php

namespace app\controllers;

class Profile extends \app\core\Controller
{
    function create_Customer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_profile = new \app\models\Customer_Profile();
            $customer_profile->CustomerId = $_SESSION['Id'];
            if (!empty($_POST['createName']) && !empty($_POST['createPhoneNumber'])) {
                $customer_profile->Phone_Number = $_POST['createPhoneNumber'];
                $customer_profile->Name = $_POST['createName'];
                $customer_profile->insert();
                session_destroy();
                header('location:/User/loginCustomer');
            } else {
                header('location:/Profile/create_Customer');
            }
        } else {
            $this->view('Profile/create_Customer');
        }
    }

    function create_Admin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_profile = new \app\models\Account_Profile();
            $customer_profile->AccountId = $_SESSION['Id'];
            if (!empty($_POST['createName']) && !empty($_POST['createPhoneNumber'])) {
                $customer_profile->Phone_Number = $_POST['createPhoneNumber'];
                $customer_profile->Name = $_POST['createName'];
                $customer_profile->insert();
                session_destroy();
                header('location:/User/loginStaff');
            } else {
                header('location:/Profile/create_Admin');
            }
        } else {
            $this->view('Profile/create_Admin');
        }
    }

    function show_Customer()
    {
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
        $customer = new \app\models\Customer();
        $customer->CustomerId = $_SESSION['CustomerId'];
        $customer = $customer->getById();
        $data['customer'] = $customer;
        $data['customer_profile'] = $customer_profile;
        $this->view('Profile/show_Customer', $data);
    }

    function show_Admin()
    {
        $account_profile = new \app\models\Account_Profile();
        $account_profile->AccountId = $_SESSION['AccountId'];
        $account_profile = $account_profile->getByAccountId();
        $account = new \app\models\Account();
        $account->AccountId = $_SESSION['AccountId'];
        $account = $account->getById();
        $data['account'] = $account;
        $data['account_profile'] = $account_profile;
        $this->view('Profile/show_Admin', $data);
    }

    function show_Maid()
    {
        $account_profile = new \app\models\Account_Profile();
        $account_profile->AccountId = $_SESSION['AccountId'];
        $account_profile = $account_profile->getByAccountId();
        $account = new \app\models\Account();
        $account->AccountId = $_SESSION['AccountId'];
        $account = $account->getById();
        $data['account'] = $account;
        $data['account_profile'] = $account_profile;
        $this->view('Profile/show_Maid', $data);
    }


    function edit_Customer()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['editName'];
        $phone_number = $_POST['editPhoneNumber'];
        if (!empty($name) && !empty($phone_number)) {
            $customer_profile = new \app\models\Customer_Profile();
            $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
            $customer_profile->Name = $name;
            $customer_profile->Phone_Number = $phone_number;
            $customer_profile->update();
            header('location:/Profile/show_Customer');
        }
    } else {
        // Fetch customer details from the database
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);

        // Pass the customer details to the view
        $data['customer_profile'] = $customer_profile;
        $this->view('Profile/edit_Customer', $data);
    }
}


    function edit_Admin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['editName'];
            $phone_number = $_POST['editPhoneNumber'];
            if (!empty($name) && !empty($phone_number)) {
                $account_profile = new \app\models\Account_Profile();
                $account_profile->AccountId = $_SESSION['AccountId'];
                $account_profile = $account_profile->getByAccountId();
                $account_profile->Name = $name;
                $account_profile->Phone_Number = $phone_number;
                $account_profile->update();
                header('location:/Profile/show_Admin');
            }
        }
        $this->view('Profile/edit_Admin');
    }

    function edit_Maid()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['editName'];
            $phone_number = $_POST['editPhoneNumber'];
            if (!empty($name) && !empty($phone_number)) {
                $account_profile = new \app\models\Account_Profile();
                $account_profile->AccountId = $_SESSION['AccountId'];
                $account_profile = $account_profile->getByAccountId();
                $account_profile->Name = $name;
                $account_profile->Phone_Number = $phone_number;
                $account_profile->update();
                header('location:/Profile/show_Maid');
            }
        }
        $this->view('Profile/edit_Maid');
    }
}
