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
        $customer_profile = new \app\models\Customer_Profile();
        $customer_profile = $customer_profile->getByCustomerId($_SESSION['CustomerId']);
        $address = new \app\models\Address();
        $address->Customer_ProfileId = $customer_profile->Customer_ProfileId;
        $address = $address->getByCustomerProfileId();
        $data = [];
        foreach ($address as $location) :
            $job = new \app\models\Job();
            $job->AddressId = $location->AddressId;
            $job = $job->getByAddressId();
            if ($job !== null) {
                $data[] = $job;
            }
        endforeach;
        $earliestJob = null;
        $earliestTime = new \DateTime();
        $earliestTime->add(new \DateInterval('P100Y'));

        foreach ($data as $job) {
            $jobTime = \DateTime::createFromFormat('Y-m-d H:i:s', $job->Time_Of_Job); // Use the global namespace prefix here
            if ($jobTime < $earliestTime) {
                $earliestTime = $jobTime;
                $earliestJob = $job;
            }
        }
        $data['earliestJob'] = $earliestJob;
        $job_address = new \app\models\Address();
        $job_address->AddressId = $earliestJob->AddressId;
        $job_address->getById();
        $data['address'] = $job_address;
        $this->view('Customer/home', $data);
    }

    function reservation_history()
    {
        $this->view('Customer/reservation_history');
    }

    function pending_orders()
    {
        $this->view('Customer/pending_orders');
    }
}
