<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// home route
$routes->get('/', 'HomeController::index');

// admin dashboard route
$routes->get('/admin/', 'DashboardController::index', ['filter' => 'auth:superadmin,admin,staff']);

// error routes
$routes->get('/not_found', 'ErrorProductionController::not_found_error');
$routes->get('/error', 'ErrorProductionController::standard_error');
$routes->get('/access_denied', 'ErrorProductionController::access_denied_error');
$routes->get('/banned', 'ErrorProductionController::banned');


service('auth')->routes($routes);

//category routes
$routes->get('/admin/categories/','CategoryController::index', ['filter' => 'auth:superadmin']);
$routes->get('/admin/categories/details/(:num)','CategoryController::details/$1');
$routes->match(['get','post'],'/admin/categories/add','CategoryController::create');
$routes->match(['get','post'],'/admin/categories/update/(:num)','CategoryController::update/$1');
$routes->match(['get','post','delete'],'/admin/categories/delete/(:num)','CategoryController::delete/$1');
$routes->match(['get','post','patch'],'/admin/categories/active/(:num)/(:num)','CategoryController::active/$1/$2');

//user routes
$routes->get('/admin/users/','UserController::index', ['filter' => 'auth:superadmin,admin,staff']);
$routes->get('/admin/users/data','UserController::users', ['filter' => 'auth:superadmin,admin,staff']);
$routes->get('/admin/users/details/(:num)','UserController::details/$1', ['filter' => 'auth:superadmin,admin,staff']);
$routes->match(['get','post'],'/admin/users/add','UserController::create', ['filter' => 'auth:superadmin']);
$routes->match(['get','post'],'/admin/users/update/(:num)','UserController::update/$1', ['filter' => 'auth:superadmin']);
$routes->delete('/admin/users/delete/','UserController::delete', ['filter' => 'auth:superadmin']);
$routes->patch('/admin/users/ban/','UserController::ban', ['filter' => 'auth:superadmin']);


//product routes
$routes->get('/admin/products/','ProductController::index', ['filter' => 'auth:superadmin,admin,staff']);
$routes->get('/admin/products/data','ProductController::products', ['filter' => 'auth:superadmin,admin,staff']);
$routes->get('/admin/products/details/(:num)','ProductController::details/$1', ['filter' => 'auth:superadmin,admin,staff']);
$routes->match(['get','post'],'/admin/products/add','ProductController::create', ['filter' => 'auth:superadmin,admin']);
$routes->match(['get','post'],'/admin/products/update/(:num)','ProductController::update/$1', ['filter' => 'auth:superadmin,admin']);
$routes->delete('/admin/products/delete/','ProductController::delete', ['filter' => 'auth:superadmin,admin']);
$routes->patch('/admin/products/active','ProductController::active', ['filter' => 'auth:superadmin,admin']);