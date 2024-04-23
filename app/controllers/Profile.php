<?php

namespace app\controllers;

class Profile extends \app\core\Controller
{
    function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_profile = new \app\models\Customer_Profile();
            $customer_profile->CustomerId = $_SESSION['CustomerId'];
            if (!empty($_POST['createName']) && !empty($_POST['createPhoneNumber'])) {
                $customer_profile->Phone_Number = $_POST['createPhoneNumber'];
                $customer_profile->Name = $_POST['createName'];
                $customer_profile->insert();
                session_destroy();
                header('location:/User/loginCustomer');
            } else {
                header('location:/Profile/create');
            }
        } else {
            $this->view('Profile/create');
        }
    }

    function show()
    {
        $this->view('Profile/show');
    }

    function edit()
    {
        $this->view('Profile/edit');
    }

}
