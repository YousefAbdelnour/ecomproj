<?php

namespace app\controllers;

class Account extends \app\core\Controller
{

    //Home page that admin user is sent 
    #[\app\filters\Admin]
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
    #[\app\filters\Staff]
    function home_maid()
    {
        $data = [];
        $bookingModel = new \app\models\Job();
        $account_job_model = new \app\models\Account_Job(); // Use a different variable name
        $bookingModel->Status = 0;
        $bookingJobs = $bookingModel->getJobsByStatus(); // Rename variable for clarity
        foreach ($bookingJobs as $job) {
            if ($job->Spots_Left > 0) {
                $account_job_model->AccountId = $_SESSION['AccountId'];
                $account_jobs = $account_job_model->getAllByAccountId(); // Use the new variable
                $flag = 0;
                foreach ($account_jobs as $account_job) {
                    if ($account_job->JobId === $job->JobId) {
                        $flag = 1;
                        break;
                    }
                }
                if ($flag === 0) {
                    $data[] = $job;
                }
            }
        }
        $this->view('/Account/home_maid', $data);
    }

    #[\app\filters\Staff]
    function schedule()
    {
        $accountJobModel = new \app\models\Account_Job();
        $accountJobModel->AccountId = $_SESSION['AccountId'];
        $accountJobs = $accountJobModel->getAllByAccountId();

        $jobIds = array_map(function ($accountJob) {
            return $accountJob->JobId;
        }, $accountJobs);

        $jobs = [];
        if (!empty($jobIds)) {
            $jobModel = new \app\models\Job();
            foreach ($jobIds as $jobId) {
                $jobModel->JobId = $jobId;
                $jobs[] = $jobModel->getById();
            }
        }

        $this->view('/Account/schedule', ['bookings' => $jobs]);
    }

    //Method that displays all information 
    #[\app\filters\Admin]

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
                $user = $accountsModel->getAdminAccounts();
                $type = 2;
                break;
            case 3:
                // Fetch and display admin accounts (assuming this method exists)
                $user = $accountsModel->getStaffAccounts();
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

    //???
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

    #[\app\filters\Admin]
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
