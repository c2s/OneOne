<?php

Route::group(['middleware' => 'web','namespace' => 'Frontend'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

});