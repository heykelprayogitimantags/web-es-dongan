<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home & Products
$routes->get('/', 'Home::index');
$routes->get('products', 'Home::products');
$routes->get('product/(:num)', 'Home::product/$1');
$routes->get('search', 'Home::search');

// Auth Routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registerProcess');
$routes->get('logout', 'Auth::logout');


// Cart Routes
$routes->get('cart', 'Cart::index');
$routes->post('cart/add', 'Cart::add');
$routes->post('cart/update', 'Cart::update');
$routes->get('cart/remove/(:num)', 'Cart::remove/$1');

// -------------------------------------------------------------------------
// Checkout Routes (UPDATED)
// -------------------------------------------------------------------------
$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/process', 'Checkout::process');

// [BARU] Route untuk upload bukti bayar (Form Action di payment_confirm.php)
$routes->post('orders/upload-proof', 'Checkout::uploadProof'); 


// -------------------------------------------------------------------------
// User Order History Routes (UPDATED)
// -------------------------------------------------------------------------
$routes->get('orders', 'Orders::index');

// [LAMA] Biarkan saja (untuk backward compatibility jika ada)
$routes->get('orders/success', 'Orders::success'); 

// [BARU] Route Sukses Spesifik dengan ID (Redirect dari Checkout::process COD)
$routes->get('orders/success/(:num)', 'Checkout::success/$1');

// [BARU] Route Halaman Konfirmasi/Bayar (Redirect dari Checkout::process Transfer/QRIS)
$routes->get('orders/payment/(:num)', 'Checkout::payment/$1');

$routes->get('orders/detail/(:num)', 'Orders::detail/$1');


// Profile Routes 
$routes->get('profile', 'Profile::index');
$routes->get('profile/edit', 'Profile::edit');
$routes->post('profile/update', 'Profile::update');
$routes->get('profile/change-password', 'Profile::changePassword');
$routes->post('profile/update-password', 'Profile::updatePassword');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    
    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Products Management
    $routes->get('products', 'Admin\Products::index');
    $routes->get('products/create', 'Admin\Products::create');
    $routes->post('products/store', 'Admin\Products::store');
    $routes->get('products/edit/(:num)', 'Admin\Products::edit/$1');
    $routes->post('products/update/(:num)', 'Admin\Products::update/$1');
    $routes->get('products/delete/(:num)', 'Admin\Products::delete/$1');

    // Categories Management
    $routes->get('categories', 'Admin\Categories::index');
    $routes->post('categories/store', 'Admin\Categories::store');
    $routes->post('categories/update/(:num)', 'Admin\Categories::update/$1');
    $routes->get('categories/delete/(:num)', 'Admin\Categories::delete/$1');

    // Orders Management (Admin View)
    $routes->get('orders', 'Admin\Orders::index');
    
    // PERBAIKAN DISINI: Tambahkan kata 'detail' agar URL-nya menjadi /admin/orders/detail/18
    $routes->get('orders/detail/(:num)', 'Admin\Orders::detail/$1'); 
    
    $routes->post('orders/update-status/(:num)', 'Admin\Orders::updateStatus/$1');

    // Users Management
    $routes->get('users', 'Admin\Users::index');
});

// Route lama QRIS (Biarkan saja tidak apa-apa, meski logic sudah pindah ke checkout/process)
$routes->group('pay', function($routes) {
    $routes->post('qris', 'Payment::qris');
});