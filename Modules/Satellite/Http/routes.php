<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'satellite', 'namespace' => 'Modules\Satellite\Http\Controllers'], function()
{
    Route::get('/', 'SatelliteController@index')->name('satellite.index');
    Route::post('/store', 'SatelliteController@store')->name('satellite.store');

    Route::get('/sfloat', 'SfloatController@index')->name('sfloat.index');
    Route::post('/sfloat/store', 'SfloatController@store')->name('sfloat.store');

});
