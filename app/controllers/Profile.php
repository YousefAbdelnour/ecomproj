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

    function show()
    {
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
        $customer = new \app\models\Customer();
        $customer->CustomerId = $_SESSION['CustomerId'];
        $customer = $customer->getById();
        $data['customer'] = $customer;
        $data['customer_profile'] = $customer_profile;
        $this->view('Profile/show', $data);
    }

    function edit()
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
                header('location:/Profile/show');
            }
        }
        $this->view('Profile/edit');
    }
}
