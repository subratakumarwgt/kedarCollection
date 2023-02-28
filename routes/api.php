<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//master crud routes
 Route::post('/upload-image', '\App\Http\Controllers\CrudController@upload_image')->name('upload-image');
   Route::post('/create-data', '\App\Http\Controllers\CrudController@create')->name('create-data');
   Route::post('/create-product', '\App\Http\Controllers\CrudController@createProduct')->name('create-product');
   Route::post('/update-product/{id}', '\App\Http\Controllers\CrudController@updateProduct')->name('update-product');
   Route::post('/distinct-data', '\App\Http\Controllers\CrudController@isDistinct')->name('distinct-data');
 Route::post('/update-data', '\App\Http\Controllers\CrudController@edit')->name('update-data');
 Route::post('/delete-data', '\App\Http\Controllers\CrudController@delete')->name('delete-data');
 Route::post('/register-user', '\App\Http\Controllers\CrudController@registration')->name('register-user');
  Route::post('/update-user', '\App\Http\Controllers\CrudController@updateUser')->name('update-user');
  Route::post('/change-password', '\App\Http\Controllers\CrudController@changePassword')->name('change-password');
  Route::get('/read-data/{model}/{table}', '\App\Http\Controllers\CrudController@read')->name('read-data');
  Route::get('/select-2/{asset_title}', '\App\Http\Controllers\CrudController@select2')->name('select-2');  
  Route::get('/select-2/{model}/{field}', '\App\Http\Controllers\CrudController@select2Model')->name('select-2-model');  
  Route::get('/get-districts/{state_name}', '\App\Http\Controllers\CrudController@getStatesOrDistricts')->name('get-state-districts');
  Route::get('/get-states', '\App\Http\Controllers\CrudController@getStatesOrDistricts')->name('get-states');
  Route::get('/get-resources', '\App\Http\Controllers\CrudController@getResources')->name('get-resources');
  Route::post('/centre-doctors', '\App\Http\Controllers\CrudController@centreDoctors')->name('centre-doctors');
  Route::post('/create-slots', '\App\Http\Controllers\CrudController@createSlots')->name('create-slots');
  Route::post('/book-appointment', '\App\Http\Controllers\CrudController@bookAppointment')->name('book-appointment');
  Route::post('/validate-appointment', '\App\Http\Controllers\CrudController@validateAppointment')->name('validate-appointment');
  Route::post('/make-order', '\App\Http\Controllers\CrudController@makeOrder')->name('make-order');
  Route::post('/make-purchase', '\App\Http\Controllers\CrudController@makePurchase')->name('make-purchase');
  Route::post('/place-order', '\App\Http\Controllers\CrudController@placeOrder')->name('place-order');
  Route::post('/place-online-order', '\App\Http\Controllers\CrudController@placeOnlineOrder')->name('place-order');
  
  Route::post('/cart/change-quantity', '\App\Http\Controllers\CrudController@changeQuantity')->name('cart.change-quantity');
  Route::post('/broadcasting/auth','\App\Http\Controllers\AdminDashboardController@verifyBroadcast')->name('broadcast-auth');
  Route::post('/product/varient', '\App\Http\Controllers\CrudController@productVarientData')->name('product-varient-data');
  Route::get('/product/get/{id}', '\App\Http\Controllers\CrudController@productGetData')->name('product-get-data');
  Route::post('/save-daily-expenses', '\App\Http\Controllers\CrudController@saveDailyExpenses')->name('save-daily-expenses');
  Route::post('/save-order-details', '\App\Http\Controllers\CrudController@saveOrderDetails')->name('save-order-details');
  Route::post('/save-charge-details', '\App\Http\Controllers\CrudController@saveChargeDetails')->name('save-charge-details');
  Route::get('/get-order/{id}', '\App\Http\Controllers\CrudController@getOrderDetails')->name('get-order');
  Route::get('/get-order-steps/{id}', '\App\Http\Controllers\CrudController@getOrderLog')->name('get-order-steps');

  //Offer API
  Route::post('/offer/save', '\App\Http\Controllers\CrudController@saveOffer')->name('offer-save');
  Route::post('/offer/edit/{id}', '\App\Http\Controllers\CrudController@editOffer')->name('offer-edit');

    //Collection API
      Route::post('/collection/save', '\App\Http\Controllers\CrudController@saveCollection')->name('collection-save');
      Route::post('/collection/edit/{id}', '\App\Http\Controllers\CrudController@editCollection')->name('collection-edit');

    //Section API
    Route::post('/section/save', '\App\Http\Controllers\CrudController@saveSection')->name('section-save');
    Route::post('/section/edit/{id}', '\App\Http\Controllers\CrudController@editSection')->name('section-edit');

    //Section API
    Route::post('/page/save', '\App\Http\Controllers\CrudController@savePage')->name('page-save');
    Route::post('/page/edit/{id}', '\App\Http\Controllers\CrudController@editPage')->name('page-edit');

  //Order Handle Routes
  Route::post('/confirm-order/{order_id}', '\App\Http\Controllers\HandleOrderController@confirmOrder')->name('confirm-order');
  Route::post('/ready-order/{order_id}', '\App\Http\Controllers\HandleOrderController@readyOrder')->name('ready-order');
  Route::post('/pack-order/{order_id}', '\App\Http\Controllers\HandleOrderController@packOrder')->name('pack-order');
  Route::post('/deliver-order/{order_id}', '\App\Http\Controllers\HandleOrderController@deliverOrder')->name('deliver-order');

  //chart api routes
  Route::get('/get-order-bar-chart', '\App\Http\Controllers\ChartController@getOrderBarChart')->name('get-order-bar-chart');
  Route::get('/get-item-revenue-bar-chart', '\App\Http\Controllers\ChartController@getItemRevenueBarChart')->name('get-item-revenue-bar-chart');
  Route::get('/get-item-unit-bar-chart', '\App\Http\Controllers\ChartController@getItemUnitBarChart')->name('get-item-unit-bar-chart');
  Route::get('/get-item-type-pie-chart', '\App\Http\Controllers\ChartController@getItemTypePieChart')->name('get-item-type-pie-chart');
  Route::get('/get-order-time-chart', '\App\Http\Controllers\ChartController@getOrderTimeChart')->name('get-order-time-chart');
  Route::get('/get-expense-bar-chart', '\App\Http\Controllers\ChartController@getExpenseBarChart')->name('get-expense-bar-chart');