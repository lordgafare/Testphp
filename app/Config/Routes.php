<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('hello', 'HelloController::index');
$routes->get('namelist', 'NameCrud::index');
$routes->get('addname', 'NameCrud::create');
$routes->post('submit-form', 'NameCrud::store');
$routes->get('editname/(:num)', 'NameCrud::singleUser/$1');
$routes->post('update', 'NameCrud::update');
$routes->get('delete/(:num)', 'NameCrud::delete/$1');
$routes->get('register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->get('login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

