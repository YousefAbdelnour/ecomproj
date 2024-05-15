<?php

namespace app\filters;

#[\Attribute]
class HasAccountProfile implements \app\core\AccessFilter
{
    public function redirected()
    {
        $accountProfile = new \app\models\Account_Profile();
        $accountProfile->AccountId = $_SESSION['AccountId'] ?? null;
        $accountProfile = $accountProfile->getByAccountId();
        if (!$accountProfile) {
            header('location:/Profile/create_Admin');
            return true;
        }
        return false;
    }
}
