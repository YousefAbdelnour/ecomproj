<?php

namespace app\filters;

#[\Attribute]
class Admin implements \app\core\AccessFilter
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

        if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
            header('location:/Account/home_maid');
            return true;
        }

        return false;
    }
}
