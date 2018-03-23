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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'System\HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    
    /**
     * Routes Clubs
     */
    Route::resource('/clubes', 'System\ClubsController');
    Route::match(['get','post'],'/clubes-delete/{id}', 'System\ClubsController@destroy')->name('ClubsDelete');

    /**
     * Routes Players
     */
    Route::resource('/jogadores', 'System\PlayerController');
    Route::match(['get','post'],'/jogadores-delete/{id}', 'System\PlayerController@destroy')->name('PlayerDelete');
    
    /**
     * Routes Games
     */
    Route::resource('/jogos', 'System\GamesController');
    Route::match(['get','post'],'/jogos-delete/{id}', 'System\GamesController@destroy')->name('JogosDelete');
    Route::match(['get','post'],'/jogos-ocorridos', 'System\GamesController@occurred')->name('Occurred');
    Route::match(['get','post'],'/jogos-futuro', 'System\GamesController@future')->name('Future');
    
    /**
     * Routes News
     */
    Route::resource('/noticias', 'System\NewsController');
    Route::match(['get','post'],'/noticias-delete/{id}', 'System\NewsController@destroy')->name('NewsDelete');

    /**
     * Routes Items
     */
    Route::resource('/itens', 'System\ItemsgController');
    Route::match(['get','post'],'/itens-delete/{id}', 'System\ItemsgController@destroy')->name('ItensDelete');

    /**
     * Routes Backing
     */
    Route::resource('/apoio', 'System\BackingController');
    Route::match(['get','post'],'/apoio-delete/{id}', 'System\BackingController@destroy')->name('BackingDelete');


});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
