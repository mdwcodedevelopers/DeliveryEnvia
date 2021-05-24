<?php

use Illuminate\Support\Facades\Route;

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
        return redirect()->route('home');
    // return view('welcome');
});


Auth::routes();


Route::group(['middleware' => ['auth']], function()
{
  Route::group(['prefix' => 'admin'], function ()
  {
    Route::namespace("App\Http\Controllers")->group(function ()
    {
      Route::get('/', "HomeController@index")->name('home');
      Route::resource('companies', "CompanyController");
      Route::resource('shops', "StoreController");
      Route::resource('products', "ProductController");
      Route::resource('users', "UserController");
      Route::resource('categories', "CategoryController");
      Route::resource('orders', "OrderController");
    });
  });
});
