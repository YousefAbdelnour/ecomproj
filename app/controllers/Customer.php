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
        $this->view('Customer/home');
    }

    function book()
    {
        $this->view('Customer/book');
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
