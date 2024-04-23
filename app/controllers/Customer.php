<?php

namespace app\controllers;

class Customer extends \app\core\Controller
{

    function home()
    {
        $this->view('Customer/home');
    }

    function book()
    {
        $this->view('Customer/book');
    }

    function profile_view()
    {
        $this->view('Customer/profile_view');
    }

    function profile_edit()
    {
        $this->view('Customer/profile_edit');
    }

    function profile_create()
    {
        $this->view('Customer/profile_create');
    }

    function address_add()
    {
        $this->view('Customer/address_add');
    }

    function address_display()
    {
        $this->view('Customer/address_display');
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
