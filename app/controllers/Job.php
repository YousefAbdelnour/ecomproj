<?php

namespace app\controllers;

class Job extends \app\core\Controller
{

    function book()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $AddressId = $_POST['address'];
            $Time_Of_Job = $_POST['date'];
            $Status = 0;
            $House_Size = $_POST['House_Size'];
            $Spots_Left = $_POST['spots'];
            $Description = $_POST['dsc'];

            if (!empty($AddressId) && !empty($Time_Of_Job) && !empty($House_Size) && !empty($Spots_Left) && !empty($Description)) {
                $job = new \app\models\Job();
                $job->AddressId = $AddressId;
                $job->Time_Of_Job = $Time_Of_Job;
                $job->Status = $Status;
                $job->House_Size = $House_Size;
                $job->Spots_Left = $Spots_Left;
                $job->Description = $Description;
                $job->insert();
                header('location:/Customer/home');
            } else {
                header('location:/Job/book');
            }
        }
        $this->view('Job/book');
    }
}
