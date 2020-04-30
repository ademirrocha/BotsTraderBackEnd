<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::POST('register', 'Api\User\UserController@store');
Route::POST('login', 'Api\Auth\AuthController@login');




Route::middleware('auth:api')->group(function () {



  Route::group(['namespace' => 'Api' ], function(){


    Route::get('/dashboard/count', 'Dashboard\DashboardController@count');

    Route::POST('logout', 'Auth\AuthController@logout');

   Route::group(['namespace' => 'User', 'prefix' => 'user' ], function(){

    Route::get('/{userId}/details', 'UserController@get');
    Route::get('/all', 'UserController@index');
    Route::get('/', 'UserController@auth');

    Route::get('/users', 'UserController@index');

  });




   Route::group(['namespace' => 'Entradas', 'prefix' => 'entradas' ], function(){

    Route::get('/', 'EntradaController@index');
    Route::get('/today', 'EntradaAtivoController@today');
    Route::POST('/cadastro', 'EntradaController@store');

  });


   Route::group(['namespace' => 'Ativo', 'prefix' => 'ativos' ], function(){

    Route::POST('/cadastro', 'AtivoController@store');
    Route::get('/', 'AtivoController@index');
  });



   Route::group(['namespace' => 'Trader', 'prefix' => 'trades' ], function(){

    Route::POST('/cadastro', 'TraderController@store');
    Route::put('/update/status', 'TraderController@updateStatus');
    Route::get('/', 'TraderController@index');
    Route::get('/today', 'TraderController@today');
  });


 });

});
