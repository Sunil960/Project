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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function() {
	
	if (Auth::check() && Auth::user()->role == 'admin') {
		return redirect('/admin/dashboard');
	}
	return view('admin.login');
});
Route::group(['middleware' => 'App\Http\Middleware\Admin'], function() 
{
	Route::resource('/admin/dashboard', 'Admin\AdminController');
	Route::resource('admin/category', 'Admin\CategoryController');
	Route::resource('admin/product', 'Admin\ProductController');
	Route::resource('admin/user', 'Admin\UserController');
	Route::resource('admin/testimonial', 'Admin\TestimonialController');
	Route::resource('/admin/paypal', 'Admin\PaypalCredentialsController');
	
});	

