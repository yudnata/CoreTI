<?php

use App\Core\Router;

Router::get('/', 'Customer\AuthController@showLogin');
Router::get('/login', 'Customer\AuthController@showLogin');
Router::post('/login', 'Customer\AuthController@login');
Router::get('/register', 'Customer\AuthController@showRegister');
Router::post('/register', 'Customer\AuthController@register');
Router::get('/logout', 'Customer\AuthController@logout');

Router::get('/home', 'Customer\HomeController@index');
Router::get('/about', 'Customer\HomeController@about');

Router::get('/shop', 'Customer\ShopController@index');
Router::post('/shop', 'Customer\ShopController@index');
Router::get('/search', 'Customer\ShopController@search');
Router::post('/search', 'Customer\ShopController@search');

Router::get('/cart', 'Customer\CartController@index');
Router::post('/cart/add', 'Customer\CartController@add');
Router::post('/cart/update', 'Customer\CartController@update');
Router::get('/cart/delete/{id}', 'Customer\CartController@delete');
Router::get('/cart/clear', 'Customer\CartController@clear');

Router::get('/checkout', 'Customer\CheckoutController@index');
Router::post('/checkout', 'Customer\CheckoutController@placeOrder');

Router::get('/orders', 'Customer\OrderController@index');

Router::get('/contact', 'Customer\ContactController@index');
Router::post('/contact', 'Customer\ContactController@send');

Router::get('/admin', 'Admin\DashboardController@index');

Router::get('/admin/products', 'Admin\ProductController@index');
Router::post('/admin/products/add', 'Admin\ProductController@add');
Router::get('/admin/products/edit/{id}', 'Admin\ProductController@edit');
Router::post('/admin/products/update', 'Admin\ProductController@update');
Router::get('/admin/products/delete/{id}', 'Admin\ProductController@delete');

Router::get('/admin/orders', 'Admin\OrderController@index');
Router::post('/admin/orders/update', 'Admin\OrderController@updateStatus');
Router::get('/admin/orders/delete/{id}', 'Admin\OrderController@delete');

Router::get('/admin/users', 'Admin\UserController@index');
Router::get('/admin/users/delete/{id}', 'Admin\UserController@delete');

Router::get('/admin/messages', 'Admin\MessageController@index');
Router::get('/admin/messages/delete/{id}', 'Admin\MessageController@delete');
