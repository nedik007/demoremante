<?php

Route::get('login', [
    'as' => 'admin.login',
    'uses' => 'LoginController@index'
]);

Route::get('product/{Product}', [
    'as' => 'admin.product',
    'uses' => 'AdminController@editProduct'
]);

Route::get('productNew', [
    'as' => 'admin.newProduct',
    'uses' => 'AdminController@createProduct'
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'LoginController@logout'
]);

Route::get('/', [
    'as' => 'admin.home',
    'uses' => 'AdminController@index'
]);

Route::post('login', [
    'as' => 'admin.doLogin',
    'uses' => 'LoginController@login'
]);

Route::post('productSave', [
    'as' => 'admin.saveProduct',
    'uses' => 'AdminController@saveProduct'
]);


