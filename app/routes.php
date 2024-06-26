<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/loginStaff', 'User,loginStaff');
$this->addRoute('User/login', 'User,login');
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
$this->addRoute('Profile/edit_Maid', 'Profile,edit_Maid');
$this->addRoute('Profile/edit_Admin', 'Profile,edit_Admin');
$this->addRoute('Profile/create_Customer', 'Profile,create_Customer');
$this->addRoute('Profile/create_Admin', 'Profile,create_Admin');
$this->addRoute('Customer/payment', 'Customer,payment');
$this->addRoute('Customer/cancel/{id}', 'Customer,cancel');
$this->addRoute('Customer/pay', 'Customer,pay');
$this->addRoute('Customer/logout', 'Customer,logout');

$this->addRoute('Address/delete/{id}', 'Address,delete');
$this->addRoute('Address/edit/{id}', 'Address,edit');
$this->addRoute('Account/display/{type}', 'Account,display');
$this->addRoute('Account/logout', 'Account,logout');
$this->addRoute('Account/home_maid', 'Account,home_maid');
$this->addRoute('Account/booking/{type}', 'Account,booking');
$this->addRoute('Account/schedule', 'Account,schedule');
$this->addRoute('Profile/show_Maid', 'Profile,show_Maid');
$this->addRoute('Account/home_admin', 'Account,home_admin');
$this->addRoute('Job/display', 'Job,display');
$this->addRoute('Job/accept/{id}', 'Job,accept');

//Messages 
$this->addRoute('Message/support', 'Message,support');
$this->addRoute('Message/sent', 'Message,sent');
$this->addRoute('', 'User,login');
$this->addRoute('Message/receivedAccount', 'Message,receivedAccount');
$this->addRoute('Message/sendMessageFromAccount', 'Message,sendMessageFromAccount');
$this->addRoute('Message/receivedByCustomer', 'Message,receivedByCustomer');
$this->addRoute('User/forgotPasswordCustomer', 'User,forgotPasswordCustomer');
$this->addRoute('User/forgotPasswordStaff', 'User,forgotPasswordStaff');
$this->addRoute('User/verifyForgotPassword2FA', 'User,verifyForgotPassword2FA');
$this->addRoute('User/resetPassword', 'User,resetPassword');
