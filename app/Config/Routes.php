<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/GetData', 'MainController::getData');
$routes->post('/save', 'MainController::save');
$routes->post('/del', 'MainController::del');

$routes->post('/authreg', 'MainController::authreg');
$routes->post('/authlog', 'MainController::authlog');
$routes->get('/getuserData', 'MainController::getuserData');

