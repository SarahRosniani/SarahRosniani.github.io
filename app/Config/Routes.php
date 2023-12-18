<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\GejalaController;
use App\Controllers\Penyakit;
use App\Controllers\Aturan;
use App\Controllers\Diagnosa;

/** 
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/redirect', 'Home::redirect');
$routes->get('/dashboard_admin', 'Home::dashboard_admin', ['filter' => 'role:admin']);

$routes->get('/users', 'ManageUser::index', ['filter' => 'role:admin']);
$routes->get('/users/create', 'ManageUser::create', ['filter' => 'role:admin']);
$routes->post('/users/create', 'ManageUser::store', ['filter' => 'role:admin']);
$routes->delete('/users/delete/(:any)', 'ManageUser::delete/$1', ['filter' => 'role:admin']);
$routes->post('/users/reset/(:any)', 'ManageUser::reset/$1', ['filter' => 'role:admin']);

$routes->get('/gejala', 'GejalaController::index', ['filter' => 'role:admin']);
$routes->get('/gejala/index', 'GejalaController::index', ['filter' => 'role:admin']);
$routes->post('/create_gejala', 'GejalaController::create', ['filter' => 'role:admin']);
$routes->put('/gejala/(:any)', 'GejalaController::update/$1', ['filter' => 'role:admin']);
$routes->delete('/gejala/(:any)', 'GejalaController::delete/$1', ['filter' => 'role:admin']);


$routes->get('/penyakit', 'Penyakit::index', ['filter' => 'role:admin']);
$routes->get('/penyakit/index', 'Penyakit::index', ['filter' => 'role:admin']);

$routes->get('/profile', 'Home::profile', ['filter' => 'role:admin']);
$routes->put('profile_admin/(:any)/update', 'Home::update/$1', ['filter' => 'role:admin']);
$routes->get('profile_admin/edit', 'Home::edit', ['filter' => 'role:admin']);

$routes->get('/dashboard_user', 'Home::dashboard_user', ['filter' => 'role:user']);
$routes->get('/diagnosa/penyakit', 'Diagnosa::index', ['filter' => 'role:user']);
$routes->post('/diagnosa/penyakit', 'Diagnosa::hasil', ['filter' => 'role:user']);