<?php

namespace app\controllers;

use \app\models\Message;


class Customer extends \app\core\Controller
{
    function logout()
    {
        session_destroy();
        header('location:/User/login');
    }

    

    function payment()
    {
        $this->view('Customer/payment');
    }
    function pay()
    {
        $this->view('Customer/pay');
    }

    function cancel($id)
    {
        $job = new \app\models\Job();
        $job->JobId = $id;
        $job = $job->getById();
        $job->Status = 2;
        $job->update();
        header('location:/Customer/home');;
    }

    function home()
    {
        // Initialize data array for view
        $data = [
            'earliestAddress' => null,
            'earliestJob' => null,
            'latestAddress' => null,
            'latestJob' => null
        ];

        // Get customer profile based on the session customer ID
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if ($customerProfile) {
            // Get addresses associated with the customer profile using the correct method name from the model
            $addresses = (new \app\models\Address())->getAllByCustomerProfileId($customerProfile->Customer_ProfileId);
            if (!empty($addresses)) {
                // Fetch all jobs for these addresses using a method designed to fetch jobs based on customer profile ID
                $jobs = (new \app\models\Job())->getAllByCustomerProfileId($customerProfile->Customer_ProfileId);

                // Find the latest job
                $latestJob = null;
                $latestTime = null;
                foreach ($jobs as $job) {
                    if ($job->Status === 1) {
                        $latestJobTime = \DateTime::createFromFormat('Y-m-d H:i:s', $job->Time_Of_Job);
                        if ($latestTime === null || $latestJobTime < $latestTime) {
                            $latestTime = $latestJobTime;
                            $latestJob = $job;
                        }
                    }
                }

                // If an latest job is found, fetch its address using the method provided by the Address model
                if ($latestJob) {
                    $latestJobAddress = new \app\models\Address();
                    $latestJobAddress->AddressId = $latestJob->AddressId;
                    $latestJobAddress = $latestJobAddress->getById();
                    if ($latestJobAddress) {
                        $data['latestAddress'] = $latestJobAddress;
                    }
                }

                // Find the earliest job
                $earliestJob = null;
                $earliestTime = null;
                foreach ($jobs as $job) {
                    if ($job->Status === 0) {
                        $jobTime = \DateTime::createFromFormat('Y-m-d H:i:s', $job->Time_Of_Job);
                        if ($earliestTime === null || $jobTime < $earliestTime) {
                            $earliestTime = $jobTime;
                            $earliestJob = $job;
                        }
                    }
                }

                // If an latest job is found, fetch its address using the method provided by the Address model
                if ($earliestJob) {
                    $earliestJobAddress = new \app\models\Address();
                    $earliestJobAddress->AddressId = $earliestJob->AddressId;
                    $earliestJobAddress = $earliestJobAddress->getById();
                    if ($earliestJobAddress) {
                        $data['earliestAddress'] = $earliestJobAddress;
                    }
                }

                // Find the earliest job

                $data['latestJob'] = $latestJob;
                $data['earliestJob'] = $earliestJob;
            }
        }

        // Render view with data array (which may contain nulls if info wasn't found)
        $this->view('Customer/home', $data);
    }



    function reservation_history()
    {
        $data = [];
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if ($customerProfile) {
            $completedJobs = (new \app\models\Job())->getJobsByStatusAndProfileId($customerProfile->Customer_ProfileId, 1);
            $data['jobs'] = $completedJobs ? $completedJobs : [];

            if (empty($data['jobs'])) {
                $data['error'] = "No completed jobs found.";
            }

            $this->view('Customer/reservation_history', $data);
        } else {
            $data['error'] = "No customer profile found.";
            $this->view('Customer/reservation_history', $data);
        }
    }

    function pending_orders()
    {
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if ($customerProfile) {
            $pendingJobs = (new \app\models\Job())->getJobsByStatusAndProfileId($customerProfile->Customer_ProfileId, 0);
            $inProgressJobs = (new \app\models\Job())->getJobsByStatusAndProfileId($customerProfile->Customer_ProfileId, 1);
            $allPendingJobs = array_merge($pendingJobs, $inProgressJobs);
            $this->view('Customer/pending_orders', ['jobs' => $allPendingJobs]);
        } else {
            $this->view('Customer/pending_orders', ['error' => 'No customer profile found.']);
        }
    }
}
