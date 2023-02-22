<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'project', 'namespace' => 'Modules\Project\Http\Controllers'], function()
{
    Route::get('/sheet', 'SheetController@index')->name('sheet.index');
    Route::view('/sheet/create', 'project::sheets.create')->name('sheet.create');
    Route::post('/sheet/store', 'SheetController@store')->name('sheet.store');


    Route::get('/doc', 'DocsController@index')->name('doc.index');
    Route::view('/doc/create', 'project::docs.create')->name('doc.create');
    Route::post('/doc/store', 'DocsController@store')->name('doc.store');

});
