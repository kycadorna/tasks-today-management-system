<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');

$routes->get('/profile', 'Profile::index');
$routes->get('/about', 'About::index');

$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::new');
$routes->post('/customers', 'Customers::create');
$routes->get('/customers/(:num)/edit', 'Customers::edit/$1');
$routes->post('/customers/(:num)', 'Customers::update/$1');

$routes->get('/users', 'Users::index');
$routes->get('/users/new', 'Users::new');
$routes->post('/users', 'Users::create');
$routes->get('/users/(:num)/edit', 'Users::edit/$1');
$routes->post('/users/(:num)', 'Users::update/$1');

$routes->get('/tasks', 'Tasks::index');

$routes->get('/tasks/new', 'Tasks::new', [
    'filter' => 'auth'
]);

$routes->post('/tasks', 'Tasks::create', [
    'filter' => 'auth'
]);

$routes->get('/tasks/(:num)/edit', 'Tasks::edit/$1', [
    'filter' => 'auth'
]);

$routes->post('/tasks/(:num)', 'Tasks::update/$1', [
    'filter' => 'auth'
]);

$routes->post('/tasks/(:num)/delete', 'Tasks::delete/$1', [
    'filter' => 'auth'
]);

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');