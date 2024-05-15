<?php

namespace app\filters;

#[\Attribute]
class AuthenticateCustomer implements \app\core\AccessFilter
{
    public function redirected()
    {
        if (!isset($_SESSION['CustomerId'])) {
            header('location:/User/login');
            return true;
        }
        return false;
    }
}
