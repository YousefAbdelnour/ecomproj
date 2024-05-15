<?php

namespace app\filters;

#[\Attribute]
class AuthenticateCustomer implements \app\core\AccessFilter
{
    public function redirected()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['CustomerId'])) {
            header('location:/User/login');
            return true;
        }

        // Check if the user has a customer profile
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if (!$customerProfile) {
            header('location:/Profile/create_Customer');
            return true;
        }

        return false;
    }
}
