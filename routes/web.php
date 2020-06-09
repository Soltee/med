<?php

use Illuminate\Support\Facades\Route;

//Common Routes
Route::get('/', 'WelcomeController@index');
Route::get('/login', 'User\AuthController@loginView')->name('login.view');
Route::get('/register', 'User\AuthController@registerView')->name('register.view');
Route::post('/login', 'User\AuthController@login')->name('login');
Route::post('/logout', 'User\AuthController@logout')->name('logout');


// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Auth::routes(['verify' => true]);

Route::get('/blog', 'WelcomeController@blog')->name('blog');
Route::get('/blog/{post}-{title}', 'WelcomeController@post')->name('blog.post');
Route::get('/cart', 'User\CartController@index')->name('cart');
Route::get('/cart/{product}', 'User\CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'User\CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'User\CartController@destroy')->name('cart.delete');
Route::delete('/cart', 'User\CartController@clear')->name('cart.clear');
Route::get('/contact-us', 'ContactController@index')->name('contact');
Route::get('/shop', 'User\ShopController@index')->name('shop');
Route::get('/shop/{product}-{slug}', 'User\ShopController@show')->name('shop.show');

Route::group(['middleware' => 'user'], function() {
	Route::get('/home', 'User\HomeController@index')->name('home');

	/* Location */
	Route::post('/location', 'User\LocationController@store');
});



Route::prefix('admin')->group(function() {

	/* CATEGORY */
	Route::get('/categories', 'Admin\CategoryController@index')->name('admin.category')->middleware('auth:admin');

	Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard')->middleware('auth:admin');


	Route::get('/login', 'Admin\AuthController@loginView')->name('admin.login.view');
	Route::post('/login', 'Admin\AuthController@login')->name('admin.login');
	Route::post('/logout', 'Admin\AuthController@logout')->name('admin.logout')->middleware('auth:admin');

	/* POSTS */
	Route::get('/posts', 'Admin\PostController@index')->name('admin.posts')->middleware('auth:admin');
	Route::get('/posts/create', 'Admin\PostController@create')->name('admin.posts.create')->middleware('auth:admin');
	Route::get('/posts/edit/{post}', 'Admin\PostController@edit')->name('admin.posts.edit')->middleware('auth:admin');
	Route::post('/posts', 'Admin\PostController@store')->name('admin.posts.store')->middleware('auth:admin');
	Route::patch('/posts/{post}', 'Admin\PostController@update')->name('admin.posts.update')->middleware('auth:admin');


	/* Products */
	Route::get('/products', 'Admin\ProductController@index')->name('admin.products')->middleware('auth:admin');
	Route::get('/products/create', 'Admin\ProductController@create')->name('admin.products.create')->middleware('auth:admin');
	Route::get('/products/edit/{product}', 'Admin\ProductController@edit')->name('admin.products.edit')->middleware('auth:admin');
	Route::post('/products/', 'Admin\ProductController@store')->name('admin.products.store')->middleware('auth:admin');
	Route::patch('/products/{product}', 'Admin\ProductController@update')->name('admin.products.update')->middleware('auth:admin');


	/* Users */
	Route::get('/users', 'Admin\UserController@index')->name('admin.users')->middleware('auth:admin');
});
