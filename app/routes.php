<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/loginStaff', 'User,loginStaff');
$this->addRoute('User/loginCustomer', 'User,loginCustomer');
$this->addRoute('User/registerCustomer', 'User,registerCustomer');
$this->addRoute('User/registerAdmin', 'User,registerAdmin');
$this->addRoute('Customer/home', 'Customer,home');
$this->addRoute('Customer/reservation_history', 'Customer,reservation_history');
$this->addRoute('Job/book', 'Job,book');
$this->addRoute('Customer/pending_orders', 'Customer,pending_orders');
$this->addRoute('Address/display', 'Address,display');
$this->addRoute('Address/add', 'Address,add');
$this->addRoute('Profile/show_Customer', 'Profile,show_Customer');
$this->addRoute('Profile/show_Admin', 'Profile,show_Admin');
$this->addRoute('Profile/edit_Customer', 'Profile,edit_Customer');
$this->addRoute('Profile/edit_Admin', 'Profile,edit_Admin');
$this->addRoute('Profile/create_Customer', 'Profile,create_Customer');
$this->addRoute('Profile/create_Admin', 'Profile,create_Admin');
$this->addRoute('Customer/payment', 'Customer,payment');
$this->addRoute('Customer/cancel/{id}', 'Customer,cancel');
$this->addRoute('Customer/pay', 'Customer,pay');
$this->addRoute('Customer/support', 'Customer,support');
$this->addRoute('Customer/logout', 'Customer,logout');
$this->addRoute('Address/delete/{id}', 'Address,delete');
$this->addRoute('Account/display/{type}', 'Account,display');
$this->addRoute('Account/home_maid', 'Account,home_maid');
$this->addRoute('Account/home_admin', 'Account,home_admin');
$this->addRoute('Job/display', 'Job,display');
