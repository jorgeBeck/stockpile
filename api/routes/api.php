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
Route::get('/', function(){return 'Cannot GET!';});

Route::group(['namespace' => 'v1','prefix' => 'v1', 'middleware' => [\Barryvdh\Cors\HandleCors::class,] ], function () {

  Route::get('/', function(){return 'Cannot GET!';});

  Route::resource('entries_list','EntryListController');
  Route::resource('entries','EntryController');
  Route::resource('items','ItemController');
  Route::resource('machines','MachineController');

});
