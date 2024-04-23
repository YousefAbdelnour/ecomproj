<?php

namespace app\controllers;

class Account extends \app\core\Controller
{
    function loginStaff()
    {
        $this->view('Account/loginStaff');
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
                header('location:/Customer/home');
            }
        } else {
            $this->view('Account/loginCustomer');
        }
    }

    function home()
    {
        $this->view('Customer/home');
    }

    //Added these two but fell free to change em however you want

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $account = new \app\models\Account();
            $account = $account->getByUsername($username);
            $password = $_POST['password'];
            if ($account && $account->IsActive == 0 && password_verify($password, $account->Password_Hash)) {
                $_SESSION['AccountId'] = $account->AccountId;
                $_SESSION['IsAdmin'] = $account->IsAdmin;
                header('location:/Account/dashboard');
            } else {
                header('location:/Account/login');
            }
        } else {
            $this->view('Account/login');
        }
    }

    function logout()
    {
        session_destroy();
        header('location:/Account/login');
    }

    function dashboard()
    {
        if (!isset($_SESSION['AccountId'])) {
            header('location:/Account/login');
            return;
        }
        echo 'Welcome to your dashboard.';
    }

    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $account = new \app\models\Account();
            $account->Username = $_POST['username'];
            $account->Password_Hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $account->IsActive = 0;
            $account->IsAdmin = 1;
            $account->insert();
            header('location:/Account/login');
        } else {
            $this->view('Account/register');
        }
    }

    function update()
    {
        if (!isset($_SESSION['AccountId'])) {
            header('location:/Account/login');
            return;
        }

        $account = new \app\models\Account();
        $account = $account->getById($_SESSION['AccountId']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $account->Username = $_POST['username'];
            if (!empty($_POST['password'])) {
                $account->Password_Hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            $account->update();
            header('location:/Account/update');
        } else {
            $this->view('Account/update', $account);
        }
    }

    function delete()
    {
        if (!isset($_SESSION['AccountId'])) {
            header('location:/Account/login');
            return;
        }

        $account = new \app\models\Account();
        $account = $account->getById($_SESSION['AccountId']);
        $account->delete();
        header('location:/Account/logout');
    }
}
