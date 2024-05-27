<?php

namespace app\controllers;

class Address extends \app\core\Controller
{
    #[\app\filters\AuthenticateCustomer]
    function delete($id)
    {
        $jobs = new \app\models\Job();
        $jobs->AddressId = $id;
        $jobs = $jobs->getByAddressId();
        if ($jobs == null) {
            $address = new \app\models\Address();
            $address->AddressId = $id;
            $address = $address->getById();
            if ($address !== null) {
                $address->delete();
            }
        }
        $this->display();
    }
    #[\app\filters\AuthenticateCustomer]
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
            $size = $_POST['House_Size'];
            if (!empty($building_number) && !empty($street_name) && !empty($zip_code) && !empty($state) && !empty($country) && !empty($size)) {
                $address->Building_Number = $building_number;
                $address->Street_Name = $street_name;
                $address->ZipCode = $zip_code;
                $address->State = $state;
                $address->Country = $country;
                $address->Size = $size;
                var_dump($address);
                $address->insert();
                header('location:/Address/display');
            }
        } else {
            $this->view('Address/add');
        }
    }
    #[\app\filters\AuthenticateCustomer]
    public function edit($id)
    {
        $address = new \app\models\Address();
        $address = $address->getByAddressId($id); // Assuming you have a method to get address by its ID

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $building_number = $_POST['addResidenceNumber'];
        $street_name = $_POST['addStreet'];
        $zip_code = $_POST['addZipCode'];
        $state = $_POST['addState'];
        $country = $_POST['addCountry'];
        $size = $_POST['House_Size'];

        if (!empty($building_number) && !empty($street_name) && !empty($zip_code) && !empty($state) && !empty($country) && !empty($size)) {
            $address->Building_Number = $building_number;
            $address->Street_Name = $street_name;
            $address->ZipCode = $zip_code;
            $address->State = $state;
            $address->Country = $country;
            $address->Size = $size;
            $address->update();

            header('location:/Address/display');
        }
    } else {
        $this->view('Address/edit', ['address' => $address]);
    }
}

    #[\app\filters\AuthenticateCustomer]
    function display()
    {
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
        $customer_profile_id = $customer_profile->Customer_ProfileId;
        $addresses = new \app\models\Address();
        $addresses = $addresses->getAllByCustomerProfileId($customer_profile_id);
        $addresses['address'] = $addresses;
        $this->view('Address/display', $addresses);
    }
}
