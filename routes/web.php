<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as' => 'homepage.index',
    'uses' => 'HomepageController@index'
]);

Route::get('categorie/{Category}', [
    'as' => 'category',
    'uses' => 'CategoryController@index'
]);

Route::get('fulltext', [
    'as' => 'fulltext',
    'uses' => 'FulltextController@index'
]);

Route::get('storage/productImages/{productId}.jpg', [
    'as' => 'product.image',
    'uses' => 'ProductController@image'
]);

Route::get('p-{Product}', [
    'as' => 'product.detail',
    'uses' => 'ProductController@index'
]);

Route::post('basket/add/{Product}', [
    'as' => 'basket.addProduct',
    'uses' => 'BasketController@addProduct'
]);


