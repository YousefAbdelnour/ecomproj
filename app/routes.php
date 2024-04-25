<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/loginStaff', 'User,loginStaff');
$this->addRoute('User/loginCustomer', 'User,loginCustomer');
$this->addRoute('User/register', 'User,register');
$this->addRoute('Customer/home', 'Customer,home');
$this->addRoute('Customer/reservation_history', 'Customer,reservation_history');
$this->addRoute('Job/book', 'Job,book');
$this->addRoute('Customer/pending_orders', 'Customer,pending_orders');
$this->addRoute('Address/display', 'Address,display');
$this->addRoute('Address/add', 'Address,add');
$this->addRoute('Profile/show', 'Profile,show');
$this->addRoute('Profile/edit', 'Profile,edit');
$this->addRoute('Profile/create', 'Profile,create');
$this->addRoute('Customer/logout', 'Customer,logout');
$this->addRoute('Address/delete/{id}', 'Address,delete');

$this->addRoute('Staff/home', 'Staff,home');
