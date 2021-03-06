<?php

use App\Http\Controllers\Admin\donators\DonatorController;
use App\Http\Controllers\Admin\needy\NeedyController;
use App\Http\Controllers\Admin\option\OptionController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\resource\ResourceController;
use App\Http\Controllers\Admin\resource\ResourceController as ResourceControllerAlias;
use App\Http\Controllers\Admin\send\SendController as SendControllerAlias;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\users\UserController;
use App\Http\Controllers\executer\ExecuterController;
use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\user\PlanController as PlanControllerUser;

Route::get('/',[PanelController::class,'index'])->name('adminPanel');
Route::middleware(['can:admin'])->group( function(){
    Route::resource('/needy',NeedyController::class);
    Route::post('/needy/delete',[NeedyController::class,'delete'])->name('needy.delete');
    Route::resource('/donate',DonatorController::class);
    Route::post('/donate/delete',[DonatorController::class,'delete'])->name('donate.delete');
    Route::resource('/resource', ResourceControllerAlias::class);
    Route::post('/resource/delete/donation',[ResourceControllerAlias::class,'DeleteDonation'])->name('resource.delete.donation');
    Route::post('/resource/delete/money',[ResourceController::class,'DeleteMoney'])->name('resource.delete.money');
    Route::resource('/send', SendControllerAlias::class);
    Route::post('/send/delete',[SendControllerAlias::class,'delete'])->name('send.delete');
    Route::get('/file/delete/{id}',[SendControllerAlias::class,'DeleteFile'])->name('file.delete');
    Route::resource('/option',OptionController::class);
    Route::resource('/plan', PlanController::class);
    Route::get('users', [UserController::class,'index'])->name('user.index');
    Route::post('users/delete/user', [UserController::class,'delete'])->name('user.delete');
    Route::get('users/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('users/{id}', [UserController::class,'update']);
    Route::get('users/new/create', [UserController::class,'create'])->name('user.create');
    Route::post('users/new/create', [UserController::class,'store']);
});

Route::middleware(['can:executer'])->prefix('executer')->group(function(){
    Route::get('ExePlan/delete/{id}',[ExecuterController::class,'delete'])->name('exeplan.delete');
    Route::get('ExePlan/toUser/{id}',[ExecuterController::class,'updateToUser'])->name('exeplan.user');
    Route::resource('ExePlan',ExecuterController::class);
});
Route::middleware(['can:user'])->prefix('user')->group(function(){
    Route::get('UserPlan',[PlanControllerUser::class,'index'])->name('userplan.index');
    Route::get('/group/{id}',[PlanControllerUser::class,'show'])->name('userplan.show');
    Route::get('/group/deleteFile/{id}',[PlanControllerUser::class,'deleteFile'])->name('userplan.deleteFile');
    Route::post('group/doc', [PlanControllerUser::class,'uploadDoc'])->name('userplan.upload');
});
