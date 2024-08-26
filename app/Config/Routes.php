<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//$routes->resource('empleados', ['controller' => 'Empleados' , 'placeholder' => '(:num)', 'except' => 'update']);

$routes->get('empleados', 'Empleados::index',['controller' => 'Empleados' , 'placeholder' => '(:num)']);

$routes->get('empleados/new', 'Empleados::new');
$routes->post('empleados', 'Empleados::create');

$routes->get('empleados/(:num)/edit','Empleados::edit/$1');
$routes->post('empleados/(:num)','Empleados::update/$1');

$routes->post('empleados/delete/(:num)', 'Empleados::delete/$1');


$routes->get('departamentos', 'Departamentos::index',['controller' => 'Departamentos' , 'placeholder' => '(:num)']);

$routes->get('departamentos/new', 'Departamentos::new');
$routes->post('departamentos', 'Departamentos::create');

$routes->get('departamentos/(:num)/edit','Departamentos::edit/$1');
$routes->post('departamentos/(:num)','Departamentos::update/$1');

$routes->post('departamentos/delete/(:num)', 'Departamentos::delete/$1');







//$routes->get('empleados', 'Empleados::editar',['controller' => 'Empleados' , 'placeholder' => '(:num)/edit']);
//$routes->post('empleados', 'Empleados::update/$1',['controller' => 'Empleados' , 'placeholder' => '(:num)']);

//$routes->get('empleados/(:segment)/edit', 'Empleados::edit/$1');
//$routes->put('empleados/(:segment)', 'Empleados::update/$1');


