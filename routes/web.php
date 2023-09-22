<?php

use Crm\User\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','App\Http\Controllers\teatApiController@index');

Route::group(['prefix'=>'Product','namespace'=>'App\Http\Controllers'],function (){
   Route::resource('/','ProductController');
   Route::get('/Git','ProductController@Git')->name('git');
});
