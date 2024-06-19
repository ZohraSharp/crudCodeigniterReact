<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::index');
// $routes->get('edit/(:num)', 'customers::edit/$1');
// $routes->get('create', 'customers::create');
// $routes->get('update/(:num)', 'customers::update/$1');
// $routes->get('delete/(:num)', 'customers::delete/$1');




$routes->resource('customers');
