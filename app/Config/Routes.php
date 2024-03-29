<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/hello', 'HelloController::index',['filter' => 'auth']);
$routes->get('/namelist', 'NameCrud::index',['filter' => 'auth']);
$routes->get('/addname', 'NameCrud::create',['filter' => 'auth']);
$routes->post('/submit-form', 'NameCrud::store',['filter' => 'auth']);
$routes->get('/editname/(:num)', 'NameCrud::singleUser/$1',['filter' => 'auth']);
$routes->post('/update', 'NameCrud::update',['filter' => 'auth']);
$routes->get('/delete/(:num)', 'NameCrud::delete/$1', ['filter' => 'auth']);
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout', ['filter' => 'auth']);
$routes->get('/resetpassword/(:num)', 'Login::singleUser/$1',['filter' => 'auth']);
$routes->post('/reset', 'Login::reset',['filter' => 'auth']);
$routes->get('/editprofile/(:num)', 'Login::edit/$1',['filter' => 'auth']);
$routes->post('/editprofile/update/(:num)', 'Login::update/$1',['filter' => 'auth']);
$routes->get('/forgot_password', 'ForgotPassword::showForgotForm');
$routes->post('/forgot_password/send_reset_link', 'ForgotPassword::send_reset_link'); 
$routes->get('/reset_password/(:any)', 'ForgotPassword::showResetForm/$1'); 
$routes->post('/reset_password/reset', 'ForgotPassword::reset'); 
$routes->post('/pattern/generate', 'HelloController::generate');
$routes->get('/doc', 'DocumentNumberController::index');
$routes->post('/doc', 'DocumentNumberController::index');
