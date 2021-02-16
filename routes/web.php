<?php

use App\Http\Controllers\CarrerController ;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/' , [CarrerController::class , 'GetPositions'])->name('Home') ;

Route::post('AddCareerInfo',[CarrerController::class , 'AddCareerInfo'])->name('AddCareerInfo') ;
