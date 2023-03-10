<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'satellite', 'namespace' => 'Modules\Satellite\Http\Controllers'], function()
{
    Route::get('/', 'SatelliteController@index')->name('satellite.index');
    Route::post('/store', 'SatelliteController@store')->name('satellite.store');

    Route::get('/sfloat', 'SfloatController@index')->name('sfloat.index');
    Route::get('/sfloat/progressList/{filter}', 'SfloatController@progressList')->name('sfloat.progressList');

    Route::post('/sfloat/store', 'SfloatController@store')->name('sfloat.store');
    Route::put('/sfloat/statusUpdate/{id}', 'SfloatController@statusUpdate')->name('sfloat.statusUpdate');

    Route::get('/factor', 'FactorController@index')->name('sfloatfactor.index');
    Route::post('/factor/store', 'FactorController@store')->name('sfloatfactor.store');

    Route::get('/reporter', 'ReporterController@index')->name('sfloatreporter.index');
    Route::post('/reporter/store', 'ReporterController@store')->name('sfloatreporter.store');

});
