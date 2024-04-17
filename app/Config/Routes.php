<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//login
$routes->get('/', 'AuthController::loginForm', ['as' => 'login.form']);
$routes->post('/login', 'AuthController::loginHandler', ['as' => 'login.handler']);
$routes->get('/logout', 'AuthController::logoutHandler', ['as' => 'logout']);

//user
$routes->get('users/index', 'UserController::index', ['as' => 'users.index']);
$routes->get('users/create', 'UserController::create', ['as' => 'users.create']);
$routes->post('users/store', 'UserController::store', ['as' => 'users.store']);
$routes->get('users/edit/(:num)', 'UserController::edit/$1', ['as' => 'users.edit']);
$routes->post('users/update/(:num)', 'UserController::update/$1', ['as' => 'users.update']);
$routes->get('/users/delete/(:num)', 'UserController::delete/$1', ['as' => 'users.delete']);
