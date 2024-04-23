<?php

namespace app\controllers;

class User extends \app\core\Controller
{
    /*The reason I made a User controller is, when a user is not logged in or registered, we can not tell what 
    type of user he is. It is much easier to asume he is anonymus and doesnt belong to any class that is why I
    (Cristian) made the User controller, so everything regarded accessing the website is handeled here and then
    depending on what type of user we have, we redirection them towards their proper controllers. One other big
    change I made is in the views, I put both login pages and register page in a new folder separated from the 
    Customer one and Account one. I will comment out the initial login and register methods in the Account controller.
    In addition, I have realized that, making a User automatically register as a Customer would be a more secure way and
    simple method to handle the permissions as the admin would change his account status to account. Maybe we find a etter solution.*/

    function loginStaff()
    {
        $this->view('User/loginStaff');
    }

    function loginCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usernameLogin'];
            $account = new \app\models\Customer();
            $account = $account->getByUsername($username);
            $password = $_POST['passwordLogin'];
            if ($account && $account->IsActive == 0 && password_verify($password, $account->Password_Hash)) {
                $_SESSION['CustomerId'] = $account->CustomerId;
                header('location:/Customer/home');
            } else {
                header('location:/User/loginCustomer');
            }
        } else {
            $this->view('User/loginCustomer');
        }
    }

    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty(trim($_POST['usernameReg']))) {
                header('location:/User/register');
            }
            $account = new \app\models\Customer();
            $account->Username = $_POST['usernameReg'];
            if ($_POST['passwordReg'] === $_POST['passwordConfirm'] && !empty(trim($_POST['passwordReg']))) {
                $account->Password_Hash = password_hash($_POST['passwordReg'], PASSWORD_DEFAULT);
                $account->IsActive = 0;
                $account->insert();
                $account = $account->getByUsername($account->Username);
                $_SESSION['CustomerId'] = $account->CustomerId;
                header('location:/Customer/profile_create');
            } else {
                header('location:/User/register');
            }
        } else {
            $this->view('User/register');
        }
    }
}
