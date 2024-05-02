<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'UserController::index');
$routes->post('/main/store', 'UserController::insert');
// $routes->put('main/update/(:num)', 'UserController::update/$1');/
$routes->get('/main/getdata', 'UserController::fetch');
$routes->post('/main/edit', 'UserController::edit');
$routes->post('/main/update', 'UserController::update');
$routes->get('/main/update', 'UserController::update');
$routes->get('/main/delete', 'UserController::delete');
$routes->post('/main/delete', 'UserController::delete');




