<?php

use App\Http\Controllers\Needy\NeedyPanelController;
use Illuminate\Support\Facades\Route;



Route::get('/',[NeedyPanelController::class,'index'])->name('npanel');
