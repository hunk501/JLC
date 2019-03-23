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


// Application
Route::get('/application', 'Application@index')->name('application');
Route::post('/application/compute', 'Application@compute');

// Insurance
Route::any('insurance/new', 'Insurance@addNew');
Route:: get('/insurance/{id}', 'Insurance@listing')->name('insurance');
Route::any('insurance/add/{id}', 'Insurance@add');
Route::any('insurance/edit/{id}', 'Insurance@edit');
Route::any('insurance/type/{id}', 'Insurance@type');

// Compute
Route::get('/compute/{insurance_id}', 'Compute@index')->name('compute');
Route::post('/compute/process', 'Compute@process');
