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
    return view('user/index');
});

Route::get('/checkout', function () {
    return view('user/checkout');
});

Route::get('/cart', function () {
    return view('user/cart');
});

Route::get('menu', 'DishesController@menu');

// Route::get('addtocart', 'DishesController@addtocart');

// Route::get('cart', 'DishesController@cart');

Route::get('/addToCart/{id}', 'DishesController@addToCart');

Route::patch('update-cart', 'DishesController@updateCart');

Route::delete('remove-from-cart', 'DishesController@remove');

Route::get('/services', function () {
    return view('user/services');
});

Route::get('/contact', function () {
    return view('user/contact');
});

Route::get('/about', function () {
    return view('user/about');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

// Route::get('/editdish', function () {
//     return view('admin/editdish');
// });


Route::resource('dish','DishesController');

Route::resource('contacts','ContactsController');

Route::get('/neworders', function () {
    return view('admin/neworders');
});

Route::get('/deliveredorders', function () {
    return view('admin/deliveredorders');
});

Route::get('/customers', function () {
    return view('admin/customers');
});

