<?php

use App\Http\Controllers\Needy\NeedyPanelController;
use Illuminate\Support\Facades\Route;



Route::get('/',[NeedyPanelController::class,'index'])->name('npanel');


Route::get('/need/{id}',[NeedyPanelController::class,'need'])->name('need');


Route::post('/need/{id}',[NeedyPanelController::class,'needStore']);
