<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Price Monitoring routes
$routes->get('monitoring', 'PriceMonitoring::index');
$routes->get('api/products', 'PriceMonitoring::getProducts');
$routes->get('api/categories', 'PriceMonitoring::getCategories');
$routes->get('api/municipalities', 'PriceMonitoring::getMunicipalities');
$routes->get('api/products/(:num)', 'PriceMonitoring::getProductDetails/$1');

// Price Comparison routes
$routes->get('price-comparison', 'PriceComparison::index');
$routes->get('api/price-comparison/products', 'PriceComparison::getProducts');

// Admin routes
$routes->get('admin', 'Admin::login');
$routes->get('admin/login', 'Admin::login');
$routes->post('admin/authenticate', 'Admin::authenticate');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes ->get('admin/product-store-management', 'Admin::productStoreManagement');
