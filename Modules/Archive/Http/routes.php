<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Modules\Archive\Http\Controllers'], function()
{
    Route::get('archives/{type}','ArchiveController@index');
    Route::post('archives','ArchiveController@store');
    Route::delete('archive/delete/{id}','ArchiveController@destroy')->name('archive.delete');
    Route::post('archive/update/{id}','ArchiveController@update');

});
