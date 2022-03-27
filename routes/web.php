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

// Test
// ---------------------------------------------------------------------------
Route::get('/test', 'Test@show');
Route::Resource('tests3', 'Test3');

// Test : With TailwindCSS
// ---------------------------------------------------------------------------
Route::get('/tailwind', function(){
	return view('posts.index');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

// AUTH
// ---------------------------------------------------------------------------
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@store');

Route::post('logout', 'Auth\LogoutController@store')->name('logout');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@store');

// DASHBOARD
// ---------------------------------------------------------------------------
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// POSTS
// ---------------------------------------------------------------------------
// Route::Resource('posts', 'PostController');
//==OR
Route::get('posts', 'PostController@index')->name('posts');
Route::post('posts', 'PostController@store');
Route::get('posts/now', 'PostController@now');
//==OR
// Route::get('/posts', [PostController::class, 'index'])->name('posts');
// Route::get('/posts/now', [PostController::class, 'now']);
// Route::post('/posts', [PostController::class, 'store']);

// Products
// ---------------------------------------------------------------------------
Route::Resource('products', 'Product');

// Categories
// ---------------------------------------------------------------------------
Route::Resource('categories', 'Category');

// Tickets
// ---------------------------------------------------------------------------
Route::Resource('tickets', 'TicketController');

// Transactions
// ---------------------------------------------------------------------------
Route::Resource('transactions', 'TransactionController');

// Operators
// ---------------------------------------------------------------------------
// Route::get('/operators', 'Operators@index');
Route::Resource('operators', 'Operator');
// Route::get('/operators', 'Operator@index');
