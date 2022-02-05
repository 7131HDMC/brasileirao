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

Route::group(['prefix' => '/'], function (){

    /**
     * View Brasileirão division championships
     */
    Route::get('/', array('as' => 'BrasileiraoFaker', 'uses' => 'BrasileiraoController@index'));
       
    /**
     * View Brasileirão division championships
     */
    Route::post('/clashe', array('as' => 'BrasileiraoSetClashe', 'uses' => 'BrasileiraoController@setClashe'));

    /**
     * View Brasileirão division championships
     */
    Route::post('/classification', array('as' => 'BrasileiraoClassification', 'uses' => 'BrasileiraoController@getClassification'));

});

