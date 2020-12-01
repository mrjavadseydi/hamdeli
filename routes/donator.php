<?php
Route::get('/',[\App\Http\Controllers\Donator\panel\PanelController::class , 'index'])->name('panel');
Route::post('/logout',[\App\Http\Controllers\auth\CustomLoginController::class , 'logout'])->name('custom.logout');
