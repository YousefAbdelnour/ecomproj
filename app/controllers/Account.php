<?php

namespace app\controllers;

class Account extends \app\core\Controller
{

    //Home page that admin user is sent 
    function home_admin()
    {
        if (!isset($_SESSION['AccountId'])) {
            header('location:/Account/login');
            return;
        }
        echo 'Welcome to your dashboard.';
    }

    function home_maid()
    {
        $bookings = new \app\models\Job();
        $bookings->MaidId = $_SESSION['AccountId'];
        $bookings = $bookings->getByMaidId();
        $this->view('/Account/home_maid', $bookings);
        
    }

    //Method that displays all information 
    function display($type)
    {
        $accounts = new \app\models\Account();
        if ($type === 1) {
            $accounts = $accounts->getStaffAccounts();
            $this->view('Account/home_admin', $accounts);
        } else if ($type === 0) {
            $accounts = $accounts->getAll();
            $this->view('/Account/home_admin', $accounts);
        } else {
            $accounts = $accounts->getCustomerAccounts();
            $this->view('/Account/home_admin', $accounts);
        }
    }
    
    //Added these two but fell free to change em however you want

    /* function login()
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
    }*/

    function logout()
    {
        session_destroy();
        header('location:/Account/login');
    }

    

    /*function register()
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
    }*/

    function update()
    {
        if (!isset($_SESSION['AccountId'])) {
            header('location:/Account/login');
            return;
        }

        $account = new \app\models\Account();
        $account->AccountId = $_SESSION['AccountId'];
        $account = $account->getById();

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
        $account->AccountId = $_SESSION['AccountId'];
        $account = $account->getById();
        $account->delete();
        header('location:/Account/logout');
    }
}