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
  return redirect('home');
});


Auth::routes();


Route::get('product-list', 'ProductController@list')->name('product.list');
Route::post('product-import', 'ProductController@productsImport')->name('product.import');
Route::get('product-export/{type}', 'ProductController@productsExport')->name('product.export');


Route::get('profile', 'UserController@profile');

Route::post('profile' , 'UserController@update_foto');

Route::get('/home', 'HomeController@index');

Route::resource('cadastros', 'CadastroController');

Route::resource('users', 'UserController');
