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

// Admin routes
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->post('admin/add-shop', 'Admin::addShop');
$routes->get('admin/get-shops', 'Admin::getShops');
