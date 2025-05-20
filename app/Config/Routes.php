<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index');
$routes->get('login', 'LoginController::index');
$routes->get('register', 'RegisterController::index');
$routes->get('/', 'AuthController::login'); // Rute halaman login
$routes->get('login', 'AuthController::login'); // Halaman login
$routes->post('login', 'AuthController::loginAction'); // Proses login
$routes->get('register', 'AuthController::register'); // Halaman register
$routes->post('register', 'AuthController::registerAction'); // Proses register
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']); // Halaman dashboard, hanya bisa diakses setelah login
$routes->get('mailbox', 'MailboxController::index');
$routes->post('login', 'Dashboard::index'); // Proses login
$routes->get('daftarnama' , to: 'DaftarNamaController::index');
