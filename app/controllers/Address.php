<?php

namespace app\controllers;

class Address extends \app\core\Controller
{
    function delete($id)
    {
        $address = new \app\models\Address();
        $address->AddressId = $id;
        $address = $address->getById();
        if ($address !== null) {
            $address->delete();
        }
        $this->display();
    }

    function add()
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
                header('location:/Address/display');
            }
        } else {
            $this->view('Address/add');
        }
    }

    function display()
    {
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
        $customer_profile_id = $customer_profile->Customer_ProfileId;
        $address = new \app\models\Address();
        $address = $address->getAllByCustomerProfileId($customer_profile_id);
        $address['address'] = $address;
        $this->view('Address/display', $address);
    }
}
