<?php

Route::group(['prefix' => 'admin'], function () {

Route::get('/data','DataController@index')->name('data');
Route::get('/perhitungan','DepositController@index')->name('perhitungan');
Route::post('/perhitungan/fetch','DepositController@fetch');
Route::post('/perhitungan/savedata','DepositController@savedata');
Route::post('/perhitungan/fetchbunga','DepositController@fetchbunga');
Route::post('/perhitungan/deposit','DepositController@deposithitung');

});
