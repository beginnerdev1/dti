<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('index', 'Home::index');
$routes->get('home', 'Home::home');
$routes->get('aboutus', 'Home::aboutus');
$routes->get('shops', 'Home::shops');

//login routes
$routes->get('admin/login', 'Auth::login');



// Admin routes
$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('get-shops', 'Admin::getShops');
    $routes->post('add-shop', 'Admin::addShop');
    $routes->post('edit-shop', 'Admin::editShop');
    $routes->post('delete-shop', 'Admin::deleteShop');
    $routes->get('get-products', 'Admin::getProducts');
    $routes->post('add-product', 'Admin::addProduct');
    $routes->post('edit-product', 'Admin::editProduct');
    $routes->post('delete-product', 'Admin::deleteProduct');
    $routes->get('get-registrations', 'Admin::getRegistrations');
    $routes->post('approve-registration', 'Admin::approveRegistration');
    $routes->post('reject-registration', 'Admin::rejectRegistration');
    
});
