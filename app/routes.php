<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/loginStaff', 'User,loginStaff');
$this->addRoute('User/loginCustomer', 'User,loginCustomer');
$this->addRoute('User/register', 'User,register');
$this->addRoute('Customer/home', 'Customer,home');
$this->addRoute('Customer/reservation_history', 'Customer,reservation_history');
$this->addRoute('Customer/book', 'Customer,book');
$this->addRoute('Customer/pending_orders', 'Customer,pending_orders');
$this->addRoute('Customer/address_display', 'Customer,address_display');
$this->addRoute('Customer/address_add', 'Customer,address_add');
$this->addRoute('Customer/profile_view', 'Customer,profile_view');
$this->addRoute('Customer/profile_edit', 'Customer,profile_edit');
$this->addRoute('Customer/profile_create', 'Customer,profile_create');
$this->addRoute('Customer/logout', 'Customer,logout');