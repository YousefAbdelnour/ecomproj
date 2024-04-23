<?php

namespace app\controllers;

class Customer extends \app\core\Controller
{
    function logout()
    {
        session_destroy();
        header('location:/User/loginCustomer');
    }

    function home()
    {
        $this->view('Customer/home');
    }

    function book()
    {
        $this->view('Customer/book');
    }

    function profile_view()
    {
        $this->view('Customer/profile_view');
    }

    function profile_edit()
    {
        $this->view('Customer/profile_edit');
    }

    function profile_create()
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
                header('location:/Customer/profile_create');
            }
        } else {
            $this->view('Customer/profile_create');
        }
    }

    function address_add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_profile = new \app\models\Customer_Profile();
            $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
            $address = new \app\models\Address();
            $address->Customer_ProfileId = $customer_profile->Customer_ProfileId;
            $building_number = $_POST['addResidenceNumber'];
            $street_name = $_POST['addStreet'];
            $zip_code = $_POST['addZipCode'];
            $state = $_POST['addState'];
            $country = $_POST['addCountry'];
            if (!empty($building_number) && !empty($street_name) && !empty($zip_code) && !empty($state) && !empty($country)) {
                $address->Building_Number = $building_number;
                $address->Street_Name = $street_name;
                $address->ZipCode = $zip_code;
                $address->State = $state;
                $address->Country = $country;
                var_dump($address);
                $address->insert();
                header('location:/Customer/address_display');
            }
        } else {
            $this->view('Customer/address_add');
        }
    }

    function address_display()
    {
        $this->view('Customer/address_display');
    }

    function reservation_history()
    {
        $this->view('Customer/reservation_history');
    }

    function pending_orders()
    {
        $this->view('Customer/pending_orders');
    }
}
