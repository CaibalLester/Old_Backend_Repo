<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/GetData', 'MainController::getData');
$routes->post('/save', 'MainController::save');