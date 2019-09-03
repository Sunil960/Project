<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors'], 'prefix' => 'v1'], function () {
	Route::post('login', 'Api\CustomerController@login');
	Route::post('register', 'Api\CustomerController@register');
	Route::post('customers', 'Api\CustomerController@index');
	Route::post('updateProfile/{id}', 'Api\CustomerController@updateProfile');
	Route::get('getUserById/{id}/{token}', 'Api\CustomerController@getProfileById');
	Route::post('logout', 'Api\CustomerController@logout');
	Route::get('categories', 'Api\CategoryController@getAllCategories');
	Route::post('categoriesByType', 'Api\CategoryController@getCategoriesByType');
	Route::resource('products', 'Api\ProductController');
	Route::get('productByCategory/{name}', 'Api\ProductController@getProductByCategory');
	Route::resource('testimonials', 'Api\TestimonialController');
	
	Route::post('forgotPassword', 'Api\ForgotPasswordController@forgotPassword');
	Route::post('resetPassword', 'Api\ForgotPasswordController@resetPassword');
	
	Route::post('contactUs', 'Api\ContactController@sendContactMail');
	
	//Bluesnap Api's
	Route::any('createTransaction', 'Api\BluesnapController@createTransaction');
    Route::any('createPlan', 'Api\BluesnapController@createPlan');
    Route::any('createSubscription', 'Api\BluesnapController@createSubscription');
    Route::any('cancelSubscription/{id}', 'Api\BluesnapController@cancelSubscription');
    Route::any('getSpecificSubscription/{id}', 'Api\BluesnapController@getSpecificSubscription');
    Route::any('getVaultedUser/{id}', 'Api\BluesnapController@getVaultedUser');
	
	Route::get('clear-cache', function() {
    Artisan::call('cache:clear');
	Artisan::call('config:cache');
    return "Cache is cleared";

});
});

