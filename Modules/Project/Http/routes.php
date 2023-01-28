<?php

Route::group(['middleware' => 'web', 'prefix' => 'project', 'namespace' => 'Modules\Project\Http\Controllers'], function()
{
    Route::get('/sheet', 'SheetController@index')->name('sheet.index');
    Route::view('/sheet/create', 'project::sheets.create')->name('sheet.create');
    Route::post('/sheet/store', 'SheetController@store')->name('sheet.store');


});
