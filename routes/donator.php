<?php
Route::get('/',[\App\Http\Controllers\Donator\panel\PanelController::class , 'index'])->name('panel');
Route::post('/logout',[\App\Http\Controllers\auth\CustomLoginController::class , 'logout'])->name('custom.logout');
Route::resource('/dn',\App\Http\Controllers\Donator\donate\DonateController::class);
Route::resource('/sn',\App\Http\Controllers\Donator\send\SendController::class);
