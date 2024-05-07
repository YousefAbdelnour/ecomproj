<?php

namespace app\controllers;

class Customer extends \app\core\Controller
{
    function logout()
    {
        session_destroy();
        header('location:/User/loginCustomer');
    }

    function home()
    {
        // Initialize data array for view
        $data = [
            'earliestJob' => null,
            'address' => null
        ];

        // Get customer profile based on the session customer ID
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if ($customerProfile) {
            // Get addresses associated with the customer profile using the correct method name from the model
            $addresses = (new \app\models\Address())->getAllByCustomerProfileId($customerProfile->Customer_ProfileId);
            if (!empty($addresses)) {
                // Fetch all jobs for these addresses using a method designed to fetch jobs based on customer profile ID
                $jobs = (new \app\models\Job())->getAllByCustomerProfileId($customerProfile->Customer_ProfileId);

                // Find the earliest job
                $earliestJob = null;
                $earliestTime = null;
                foreach ($jobs as $job) {
                    $jobTime = \DateTime::createFromFormat('Y-m-d H:i:s', $job->Time_Of_Job);
                    if ($earliestTime === null || $jobTime < $earliestTime) {
                        $earliestTime = $jobTime;
                        $earliestJob = $job;
                    }
                }

                // If an earliest job is found, fetch its address using the method provided by the Address model
                if ($earliestJob) {
                    $jobAddress = new \app\models\Address();
                    $jobAddress->AddressId = $earliestJob->AddressId;
                    $jobAddress = $jobAddress->getById();
                    if ($jobAddress) {
                        $data['address'] = $jobAddress;
                    }
                }

                $data['earliestJob'] = $earliestJob;
            }
        }

        // Render view with data array (which may contain nulls if info wasn't found)
        $this->view('Customer/home', $data);
    }



    function reservation_history()
    {
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if ($customerProfile) {
            $completedJobs = (new \app\models\Job())->getJobsByStatusAndProfileId($customerProfile->Customer_ProfileId, 2);
            $this->view('Customer/reservation_history', ['jobs' => $completedJobs]);
        } else {
            $this->view('Customer/reservation_history', ['error' => 'No customer profile found.']);
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
