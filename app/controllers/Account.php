<?php

namespace app\controllers;

class Account extends \app\core\Controller
{

    //Home page that admin user is sent 
    function booking($type)
    {
        $bookingModel = new \app\models\Job();
        $data = [];
        switch ($type) {
            case 1:
                $bookingModel->Status = 0;
                $job = $bookingModel->getJobsByStatus();
                $type = 1;
                break;
            case 2:
                $bookingModel->Status = 1;
                $job = $bookingModel->getJobsByStatus();
                $type = 2;
                break;
            case 3:
                $bookingModel->Status = 2;
                $job = $bookingModel->getJobsByStatus();
                $type = 3;
                break;
            default:
                // Handle invalid type case
                $job = [];
                $type = 0;
                break;
        }
        $this->view('/Account/booking', compact('job', 'type'));
    }

    function home_maid()
    {
        $data = [];
        $bookingModel = new \app\models\Job();
        $bookingModel->Status = 0;
        $data = $bookingModel->getJobsByStatus();
        $this->view('/Account/home_maid', $data);
    }

    function schedule()
    {
        $bookings = new \app\models\Job();
        $bookings->MaidId = $_SESSION['AccountId'];
        $bookings = $bookings->getByMaidId();
        $this->view('/Account/schedule', $bookings);
    }

    //Method that displays all information 
    function display($type)
    {
        $accountsModel = new \app\models\Account();
        $data = [];
        switch ($type) {
            case 1:
                // Fetch and display customer accounts
                $user = $accountsModel->getCustomerAccounts();
                $type = 1;
                break;
            case 2:
                // Fetch and display staff accounts
                $user = $accountsModel->getStaffAccounts();
                $type = 2;
                break;
            case 3:
                // Fetch and display admin accounts (assuming this method exists)
                $user = $accountsModel->getAdminAccounts();
                $type = 3;
                break;
            default:
                // Handle invalid type case
                $user = [];
                $type = 0;
                break;
        }
        $this->view('Account/home_admin', compact('user', 'type'));
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
        header('location:/User/loginStaff');
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
