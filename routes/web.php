<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function(){
    return view('admin');
});


// CMS Products
Route::get('/product/{id}', 'Products@lists')->name('product');
Route::any('/product/add/{id}', 'Products@add');
Route::any('/product/edit/{pc_id}/{p_id}', 'Products@edit');
Route::post('/product/delete', 'Products@delete');

// Category
Route::any('/category', 'ProductCategory@lists')->name('category');
Route::any('/category/form', 'ProductCategory@form');
Route::post('/category/delete', 'ProductCategory@delete');
Route::any('/category/edit/{pc_id}', 'ProductCategory@edit');


// Application
Route::get('/application', 'Application@index')->name('application');
Route::post('/application/compute', 'Application@compute');


// Home Products
Route::get('/products', 'HomeProducts@index');

