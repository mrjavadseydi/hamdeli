<?php
Route::get('/',[\App\Http\Controllers\Admin\PanelController::class,'index'])->name('adminPanel');
Route::resource('/needy',\App\Http\Controllers\admin\needy\NeedyController::class);
Route::post('/needy/delete',[\App\Http\Controllers\admin\needy\NeedyController::class,'delete'])->name('needy.delete');
