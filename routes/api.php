<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['prefix' => 'Customer', 'namespace' => 'App\Http\Controllers'], function () {
        Route::get('/', 'CustomerController@index')->name('customerIndex');
        Route::post('/Store', 'CustomerController@store')->name('customerStore');
        Route::post('/Export', 'CustomerController@export')->name('customerExport');
        Route::patch('/Update/{id}', 'CustomerController@update')->name('customerUpdate');
        Route::delete('/Delete/{id}', 'CustomerController@destery')->name('customerDelete');
        Route::get('/{id}', 'CustomerController@show')->name('customerShow');
    });
    Route::group(['prefix' => 'Note', 'namespace' => 'App\Http\Controllers'], function () {
        Route::get('/', 'NoteController@index')->name('noteIndex');
        Route::get('{id}/Customer/{customerId}', 'NoteController@indexCustomerNote')->name('CustomerNoteIndex');
        Route::post('/Store/Customer/{customerId}', 'NoteController@store')->name('noteStore');
        Route::patch('/Update/{id}', 'NoteController@update')->name('noteUpdate');
        Route::delete('/Delete/{id}', 'NoteController@destery')->name('noteDelete');
        Route::get('/{id}', 'NoteController@show')->name('noteShow');
    });
    Route::group(['prefix' => 'Project', 'namespace' => 'App\Http\Controllers'], function () {
        Route::get('/', 'ProjectController@index')->name('projectIndex');
        Route::get('{id}/Customer/{customerId}', 'ProjectController@indexCustomerProject')->name('CustomerProjectIndex');
        Route::post('/Store/Customer/{customerId}', 'ProjectController@store')->name('projectStore');
        Route::patch('/Update/{id}', 'ProjectController@update')->name('projectUpdate');
        Route::delete('/Delete/{id}', 'ProjectController@destery')->name('projectDelete');
        Route::get('/{id}', 'ProjectController@show')->name('projectShow');
    });
    Route::group(['prefix' => 'Bill', 'namespace' => 'App\Http\Controllers'], function () {
        Route::get('/', 'BillController@index')->name('billIndex');
        Route::get('{id}/Customer/{customerId}', 'BillController@indexCustomerBill')->name('CustomerBillIndex');
        Route::get('{id}/Project/{projectId}', 'BillController@indexProjectBill')->name('projectBillIndex');
        Route::get('{id}/Customer/{customerId}/Project/{projectId}', 'BillController@indexCustomerAndProjectBill')->name('CustomerBillIndex');
        Route::post('/Store/Customer/{customerId}/Project/{projectId}', 'BillController@store')->name('billStore');
        Route::patch('/Update/{id}', 'BillController@update')->name('billUpdate');
        Route::delete('/Delete/{id}', 'BillController@delete')->name('billDelete');
        Route::get('/{id}', 'BillController@show')->name('billShow');
    });
    Route::group(['prefix' => 'User', 'namespace' => 'App\Http\Controllers'], function () {
        Route::get('/', 'UserController@index')->name('userIndex');
        Route::post('/Store', 'UserController@store')->name('userStore');
        Route::get('/{id}', 'UserController@show')->name('userShow');
    });

});
