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
$routes->get('editnames/(:num)', 'NameCrud::sigleUser/$1');
$routes->post('update', 'NameCrud::update');
$routes->get('delete/(:num)', 'NameCrud::delete/$1');

