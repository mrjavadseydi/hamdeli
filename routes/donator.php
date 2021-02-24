<?php

use App\Http\Controllers\auth\CustomLoginController;
use App\Http\Controllers\Donator\donate\DonateController;
use App\Http\Controllers\Donator\panel\PanelController as PanelControllerAlias;
use App\Http\Controllers\Donator\send\SendController;

Route::get('/',[PanelControllerAlias::class , 'index'])->name('panel');
Route::post('/logout',[CustomLoginController::class , 'logout'])->name('custom.logout');
Route::resource('/dn',DonateController::class);
Route::resource('/sn', SendController::class);
