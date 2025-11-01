<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

// Resident Routes - SEPARATE from admin
$routes->get('resident/dashboard', 'ResidentController::dashboard');
$routes->get('resident/request', 'ResidentController::request');
$routes->post('resident/request/submit', 'ResidentController::submitRequest');
$routes->get('resident/profile', 'ResidentController::profile');
$routes->post('resident/profile/update', 'ResidentController::updateProfile');

$routes->get('/', 'LandingController::index');
$routes->get('landing', 'LandingController::index');
$routes->get('officials', 'LandingController::officials');
$routes->get('about', 'LandingController::about');
$routes->get('login', 'LoginController::index');



$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    
    // Officials Routes
    $routes->get('officials', 'AdminController::officials');
    $routes->get('officials/add', 'AdminController::add_official');
    $routes->post('officials/save', 'AdminController::save_official');
    $routes->get('officials/delete/(:num)', 'AdminController::delete_official/$1');
    
    // Residents Routes
    $routes->get('residents', 'ResidentController::index');
    $routes->get('residents/create', 'ResidentController::create');
    $routes->post('residents/store', 'ResidentController::store');
    $routes->get('residents/edit/(:num)', 'ResidentController::edit/$1');
    $routes->post('residents/update/(:num)', 'ResidentController::update/$1');
    $routes->get('residents/delete/(:num)', 'ResidentController::delete/$1');
    
    // Certification Routes
    $routes->get('certification', 'AdminController::certification');
    $routes->get('certification/approve/(:num)', 'AdminController::approve_certificate/$1');
    $routes->get('certification/reject/(:num)', 'AdminController::reject_certificate/$1');
});
