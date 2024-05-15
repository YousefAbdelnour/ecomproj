<?php

namespace app\filters;

#[\Attribute]
class AuthenticateAccount implements \app\core\AccessFilter
{
    public function redirected()
    {
        if (!isset($_SESSION['AccountId'])) {
            header('location:/User/login');
            return true;
        }
        // Check if the user has an account profile
        $accountProfile = new \app\models\Account_Profile();
        $accountProfile->AccountId = $_SESSION['AccountId'];
        $accountProfile = $accountProfile->getByAccountId();
        if (!$accountProfile) {
            header('location:/Profile/create_Admin');
            return true;
        }
        return false;
    }
}
