<?php

Route::group(['prefix' => 'admin',
            'middleware' => 'auth'
            ], function () {
Route::view('/dashboard','dashboard.index')->name('dashboard');
Route::get('/data','DataController@index')->name('data');
Route::get('/data/hapus/{id}','DataController@delete');
Route::get('/perhitungan','DepositController@index')->name('perhitungan');
Route::post('/perhitungan/fetch','DepositController@fetch');
Route::post('/perhitungan/savedata','DepositController@savedata');
Route::post('/perhitungan/fetchbunga','DepositController@fetchbunga');
Route::post('/perhitungan/deposit','DepositController@deposithitung');
Route::get('/perhitungan/check','DepositController@check');
Route::get('/bunga','DashboardController@bunga');

});
