<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->get('empleados', 'Empleados::index');
// $routes->get('empleados/new', 'Empleados::new');

$routes->resource('empleados', ['placeholder' => '(:num)', 'except' => 'show']);

// $routes->get('activos', 'Activos::index');
// $routes->get('activos/new', 'Activos::new');

$routes->resource('activos', ['placeholder' => '(:num)', 'except' => 'show']);