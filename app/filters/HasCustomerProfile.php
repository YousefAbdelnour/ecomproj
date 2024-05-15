<?php
namespace app\filters;

#[\Attribute]
class HasCustomerProfile implements \app\core\AccessFilter {
    public function redirected() {
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId'] ?? null);
        if (!$customerProfile) {
            header('location:/Profile/create_Customer');
            return true;
        }
        return false;
    }
}
