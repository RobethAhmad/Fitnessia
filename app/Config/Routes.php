<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'homepage::index');

// route product with filter auth
$routes->group('', ['filter' => 'auth'] ,function ($routes) {
    $routes->get('/product', 'product::index');
    $routes->get('/product/read', 'product::read');
    $routes->post('/product/create', 'product::create');
    $routes->post('/product/edit', 'product::edit');
    $routes->post('/product/update', 'product::update');
    $routes->post('/product/delete', 'product::delete');
    $routes->post('/product/delete_batch', 'product::delete_batch');
    
});
$routes->post('/update-user-level', 'Auth::updateUserLevel');
$routes->get('/pemula', 'Homepage::class1');
$routes->get('/menengah', 'Homepage::class2');
$routes->get('/ahli', 'Homepage::class3');

$routes->get('/dashadmin', 'Homepage::dashadmin');

// route auth with filter auth:page
$routes->group('', ['filter' => 'auth:page'] ,function ($routes) {
    $routes->get('/login', 'auth::index_login');
    $routes->post('/login', 'auth::login');
    $routes->get('/register', 'auth::index_register');
    $routes->post('/register', 'auth::register');

});

$routes->get('/logout', 'auth::logout');