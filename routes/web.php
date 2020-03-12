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

Route::get('/', ['as'=>'index', 'uses'=>'PagesController@index']);

Route::get('/blog', ['as'=>'blog', 'uses'=>'PagesController@blog']);

Route::get('/contact', ['as'=>'contact', 'uses'=>'PagesController@contact']);

Route::get('/checkout', ['as'=>'checkout', 'uses'=>'PagesController@checkout']);

Route::get('/product_details/{id}', ['as'=>'product_details', 'uses'=>'PagesController@product_details']);

Route::get('/allitems', ['as'=>'allitems', 'uses'=>'PagesController@allitems']);

Route::get('/products_in_types/{id_type}', ['as'=>'products_in_types', 'uses'=>'PagesController@products_in_types']);

Route::get('/add_to_cart/{id}', ['as'=>'add_to_cart', 'uses'=>'PagesController@add_to_cart']);

Route::get('/delete_cart/{id}', ['as'=>'delete_cart', 'uses'=>'PagesController@delete_cart']);

Route::get('/search', ['as'=>'search', 'uses'=>'PagesController@search']);

Route::post('/checkout', ['as'=>'checkout', 'uses'=>'PagesController@post_checkout']);

//User

Route::get('/login', ['as'=>'login', 'uses'=>'PagesController@login']);

Route::get('/register', ['as'=>'register', 'uses'=>'PagesController@register']);

Route::post('/register', ['as'=>'register', 'uses'=>'PagesController@post_register']);

Route::post('/login', ['as'=>'login', 'uses'=>'PagesController@post_login']);

Route::get('/logout', ['as'=>'logout', 'uses'=>'PagesController@logout']);

Route::get('/profile', ['as'=>'profile', 'uses'=>'PagesController@profile']);

//Admin

Route::get('/admin', ['as'=>'admin_login', 'uses'=>'AdminController@login']);

Route::get('/dashboard', 'AdminController@dashboard');

Route::post('/admin', ['as'=>'admin_login', 'uses'=>'AdminController@post_login']);

Route::get('/logout', ['as'=>'admin_logout', 'uses'=>'AdminController@logout']);

Route::get('/addProduct', ['as'=>'addProduct', 'uses'=>'AdminController@addProduct']);

Route::post('/addProduct', ['as'=>'addProduct', 'uses'=>'AdminController@post_addProduct']);

Route::get('/addUser', ['as'=>'addUser', 'uses'=>'AdminController@addUser']);

Route::post('/addUser', ['as'=>'addUser', 'uses'=>'AdminController@post_addUser']);

Route::get('/addType', ['as'=>'addType', 'uses'=>'AdminController@addType']);

Route::post('/addType', ['as'=>'addType', 'uses'=>'AdminController@post_addType']);

Route::get('/deleteUser/{id}', ['as'=>'deleteUser', 'uses'=>'AdminController@deleteUser']);

Route::get('/deleteType/{id}', ['as'=>'deleteType', 'uses'=>'AdminController@deleteType']);

Route::get('/deleteProduct/{id}', ['as'=>'deleteProduct', 'uses'=>'AdminController@deleteProduct']);

Route::get('/deleteBill/{id}', ['as'=>'deleteBill', 'uses'=>'AdminController@deleteBill']);

Route::get('/editUser/{id}', ['as'=>'editUser', 'uses'=>'AdminController@editUser']);

Route::post('/editUser/{id}', ['as'=>'editUser', 'uses'=>'AdminController@post_editUser']);

Route::get('/editType/{id}', ['as'=>'editType', 'uses'=>'AdminController@editType']);

Route::post('/editType/{id}', ['as'=>'editType', 'uses'=>'AdminController@post_editType']);

Route::get('/cancel', ['as'=>'cancel', 'uses'=>'AdminController@cancel']);

Route::get('/viewBillDetails/{id}', ['as'=>'viewBillDetails', 'uses'=>'AdminController@viewBillDetails']);

Route::get('/editProduct/{id}', ['as'=>'editProduct', 'uses'=>'AdminController@editProduct']);

Route::post('/editProduct/{id}', ['as'=>'editProduct', 'uses'=>'AdminController@post_editProduct']);