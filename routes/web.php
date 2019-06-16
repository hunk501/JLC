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

Route::get('/', 'Index@index');
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

// CMS Category
Route::any('/category', 'ProductCategory@lists')->name('category');
Route::any('/category/form', 'ProductCategory@form');
Route::post('/category/delete', 'ProductCategory@delete');
Route::any('/category/edit/{pc_id}', 'ProductCategory@edit');

// CMS Rental Category
Route::any('/rent_cat', 'RentalCategory@lists');
Route::any('/rent_cat/form', 'RentalCategory@form');
Route::post('/rent_cat/delete', 'RentalCategory@delete');
Route::any('/rent_cat/edit/{rc_id}', 'RentalCategory@edit');

// CMS Rental Products
Route::get('/rent_prod/{id}', 'RentalProduct@lists');
Route::any('/rent_prod/add/{id}', 'RentalProduct@add');
Route::any('/rent_prod/edit/{pc_id}/{p_id}', 'RentalProduct@edit');
Route::post('/rent_prod/delete', 'RentalProduct@delete');

// CMS Sales
Route::get('/sales', 'Sales@index');
Route::any('/sales/edit/{id}', 'Sales@edit');
Route::post('/sales/delete', 'Sales@delete');

// CMS Quotes
Route::get('/quotes', 'RequestQuotes@lists');
Route::post('/quotes/delete', 'RequestQuotes@delete');

// CMS Settings
Route::get('/settings', 'Settings@index')->name('settings');
Route::post('/settings/update', 'Settings@update');

// Application
Route::get('/application', 'Application@index')->name('application');
Route::post('/application/compute', 'Application@compute');


// Home Products
Route::get('/products', 'HomeProducts@index');
Route::get('/rental', 'HomeRental@index');
Route::get('/rental/view/{id}', 'HomeRental@view');
Route::post('/rental/add_to_cart', 'HomeRental@add_to_cart');

Route::get('/cart', 'Cart@index');
Route::post('/cart/update', 'Cart@update');

Route::get('/checkout/confirm', 'Checkout@confirm');
Route::get('/checkout/thankyou', 'Checkout@thankyou');

Route::get('/orders', 'Orders@lists');

Route::get('/services', 'HomeServices@index');
Route::get('/services/view/{id}', 'HomeServices@view');
Route::post('/services/quote', 'HomeServices@sendQuote');

Route::get('/projects', 'HomeProjects@index');
Route::get('/projects/view/{id}', 'HomeProjects@view');


