<?php
Route::get('/',[\App\Http\Controllers\Admin\PanelController::class,'index'])->name('adminPanel');
