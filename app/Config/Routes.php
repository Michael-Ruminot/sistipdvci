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
$routes->resource('admin', ['filter' => 'AdminFilter'], ['placeholder' => '(:num)', 'except' => 'show']);

// Rutas user
$routes->resource('user', ['filter' => 'UserFilter'], ['placeholder' => '(:num)', 'except' => 'show']);

//Rutas empleados
$routes->resource('empleados', ['filter' => 'AdminFilter'], ['placeholder' => '(:num)', 'except' => 'show']);

//Rutas activos
$routes->resource('activos', ['filter' => 'AdminFilter'], ['placeholder' => '(:num)', 'except' => 'show']);
$routes->get('activos', 'Activos::subir');

//Rutas sedes
$routes->resource('sedes', ['placeholder' => '(:num)', 'except' => 'show']);

//Rutas activos
$routes->resource('reset', ['filter' => 'AdminFilter'], ['placeholder' => '(:num)', 'except' => 'show']);





