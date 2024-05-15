<?php

namespace app\filters;

#[\Attribute]
class Staff implements \app\core\AccessFilter
{
    public function redirected()
    {
        if (!isset($_SESSION['AccountId'])) {
            // Redirect to the general login page if not logged in
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

        // Check if the user is a staff member (not an admin)
        if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== false) {
            // Redirect to the staff-specific login page if not a staff member
            header('location:/User/loginStaff');
            return true;
        }

        return false;
    }
}
