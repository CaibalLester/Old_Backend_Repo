<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/GetData', 'MainController::getData');
$routes->get('/GetData2', 'MainController::getData2');
$routes->post('/save', 'MainController::save');
$routes->post('/save2', 'MainController::save2');
$routes->post('/del', 'MainController::del');

$routes->post('/authreg', 'MainController::authreg');
$routes->match(['post', 'get'],'/login', 'MainController::login');
$routes->get('/getuserData', 'MainController::getuserData');
