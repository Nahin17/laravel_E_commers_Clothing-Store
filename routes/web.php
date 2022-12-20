<?php

use Illuminate\Support\Facades\Route;

use APP\Http\Controllers\HomeController;
use APP\Http\Controllers\AdminController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', 'App\Http\Controllers\HomeController@home')->middleware('auth','verified');
//Route::get('/redirect', 'App\Http\Controllers\HomeController@home');
//route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/view_catagory', 'App\Http\Controllers\AdminController@viewCatagory');

Route::post('/add_catagory', 'App\Http\Controllers\AdminController@addCatagory');

Route::get('/delete_catagory/{id}', 'App\Http\Controllers\AdminController@deleteCatagory');

Route::get('/view_product', 'App\Http\Controllers\AdminController@viewProduct');

Route::post('/add_product', 'App\Http\Controllers\AdminController@addProduct');

Route::get('/show_product', 'App\Http\Controllers\AdminController@showProduct');

Route::get('/edit_product/{id}', 'App\Http\Controllers\AdminController@editProduct');

Route::get('/delete_product/{id}', 'App\Http\Controllers\AdminController@deleteProduct');

Route::post('/edit_product_confirm/{id}', 'App\Http\Controllers\AdminController@editProductconfirm');


// aita pore ashche

Route::get('/order', 'App\Http\Controllers\AdminController@order');

Route::get('/delivered/{id}', 'App\Http\Controllers\AdminController@delivered');
// why this is not a post method?? maybe kono form nai er jonno

Route::get('/print_pdf/{id}', 'App\Http\Controllers\AdminController@print_pdf');

Route::get('/send_email/{id}', 'App\Http\Controllers\AdminController@sendEmail');

Route::post('/send_email_notifi/{id}', 'App\Http\Controllers\AdminController@send_email_notifi');

Route::get('/search', 'App\Http\Controllers\AdminController@searchData');

Route::get('/testimonial', 'App\Http\Controllers\AdminController@testimonial');

















Route::get('/product_details/{id}', 'App\Http\Controllers\HomeController@productDetails');

Route::post('/add_cart/{id}', 'App\Http\Controllers\HomeController@addCart');

Route::get('/show_cart', 'App\Http\Controllers\HomeController@showcart');

Route::get('/remove_cart/{id}', 'App\Http\Controllers\HomeController@removeCart');

Route::get('/cash_order', 'App\Http\Controllers\HomeController@cashOrder');

Route::get('/stripe/{totalprice}', 'App\Http\Controllers\HomeController@stripe');
  

Route::post('stripe/{totalprice}', 'App\Http\Controllers\HomeController@stripePost')->name('stripe.post');

//  Route::post('stripe', 'stripePost')->name('stripe.post') modified version uporer ta


Route::get('/show_order', 'App\Http\Controllers\HomeController@showOrder');

Route::get('/cancel_order/{id}', 'App\Http\Controllers\HomeController@cancelOrder');



Route::post('/add_comment', 'App\Http\Controllers\HomeController@addComment');

Route::post('/add_reply', 'App\Http\Controllers\HomeController@addReply');

Route::get('/product_search', 'App\Http\Controllers\HomeController@productSearch');

Route::get('/allproduct', 'App\Http\Controllers\HomeController@allProduct');
//header file e

Route::get('/search_allproduct', 'App\Http\Controllers\HomeController@searchAllproduct');


Route::get('/add_testimonial', 'App\Http\Controllers\HomeController@add_testimonial');

Route::post('/adding_testimonial', 'App\Http\Controllers\HomeController@adding_testimonial');

Route::get('/show_testimonial', 'App\Http\Controllers\HomeController@show_testimonial');
