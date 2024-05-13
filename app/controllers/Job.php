<?php

namespace app\controllers;

class Job extends \app\core\Controller
{
    function book()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $AddressId = $_POST['address'];
            $Time_Of_Job = $_POST['date'];
            $Status = 0;  // Assuming status is set by default
            $House_Size = $_POST['House_Size'];
            $Spots_Left = $_POST['spots'];
            $Description = $_POST['dsc'];
            $MaidId = $_POST['maid'] ?? null;  // Check if MaidId is provided; if not, use null

            // Check mandatory fields are provided
            if (!empty($AddressId) && !empty($Time_Of_Job) && !empty($House_Size) && !empty($Spots_Left) && !empty($Description)) {
                $job = new \app\models\Job();
                $job->AddressId = $AddressId;
                $job->Time_Of_Job = $Time_Of_Job;
                $job->Status = $Status;
                $job->House_Size = $House_Size;
                $job->Spots_Left = $Spots_Left;
                $job->Description = $Description;
                $job->MaidId = $MaidId;  // Assign MaidId, which could be null

                $job->insert();  // Call the insert method from Job model
                header('Location: /Customer/home');  // Redirect after successful operation
            } else {
                header('Location: /Job/book');  // Redirect back to form if validation fails
            }
        } else {
            // Prepare data for GET request, for example, fetch addresses to populate dropdown
            $this->prepareDataForForm();
        }
    }

    function accept($id)
    {
        $job = new \app\models\Job();
        $job->JobId = $id;
        $job->getById();  // Populate $job with the job details including AddressId

        if ($job->Spots_Left !== 0) {
            $job->Spots_Left--;  // Decrement the spots left

            // Only proceed if AddressId is not null
            if (!is_null($job->AddressId)) {
                $job->update();  // Update the job in the database

                $accountJob = new \app\models\Account_Job();
                $accountJob->AccountId = $_SESSION['AccountId'];
                $accountJob->JobId = $id;
                $accountJob->insert();  // Link the account and the job
            }
        }
        header('Location: /Account/schedule');
        exit;  // Ensure no further code is run after redirection
    }
    private function prepareDataForForm()
    {
        $customerProfile = (new \app\models\Customer_Profile())->getByCustomerId($_SESSION['CustomerId']);
        if ($customerProfile) {
            $addresses = (new \app\models\Address())->getAllByCustomerProfileId($customerProfile->Customer_ProfileId);
            $this->view('Job/book', ['addresses' => $addresses]);
        } else {
            $this->view('Job/book', ['error' => 'No customer profile found.']);
        }
    }
    function display()
    {
        $jobModel = new \app\models\Job();
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
        $customer_profile_id = $customer_profile->Customer_ProfileId;
        $bookings = $jobModel->getAllByCustomerProfileId($customer_profile_id);

        // Initialize the $data array
        $data = [];
        $pending = [];
        if (empty($bookings)) {
            // Handle case where no bookings are found
            $data['message'] = "No bookings found for the current customer profile.";
        } else {
            foreach ($bookings as $booking) {
                if ($booking->Status === 0) {
                    $pending[] = $booking;
                }
            }
            $data['bookings'] = $pending;
        }
        $this->view('Job/display', $data);
    }
}
