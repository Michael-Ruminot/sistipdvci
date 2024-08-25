<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Direccion url, controller, function
$routes->get('/', 'Login::index'); 
$routes->post('/auth', 'Login::auth');  /// login/action = auth 
$routes->get('/logout', 'Login::logout');

// Despues de iniciar sesion

// Rutas Admin
$routes->get('/admin', 'HomeAdmin::index', ['filter' => 'AdminFilter']);

// Rutas user
$routes->get('/user', 'HomeUser::index', ['filter' => 'UserFilter']);


// $routes->get('empleados', 'Empleados::index');
// $routes->get('empleados/new', 'Empleados::new');
$routes->resource('empleados', ['filter' => 'AdminFilter'], ['placeholder' => '(:num)', 'except' => 'show']);

// $routes->get('activos', 'Activos::index');
// $routes->get('activos/new', 'Activos::new');
$routes->resource('activos', ['filter' => 'AdminFilter'], ['placeholder' => '(:num)', 'except' => 'show']);

