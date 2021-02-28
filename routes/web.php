<?php

use App\Http\Controllers\Needy\NeedyLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('adminPanel'));
})->name('dashboard');


/////singup route
Route::post('/needy',[\App\Http\Controllers\auth\SingUpController::class,'CreatePoorsAccount'])->name('createPoor');
Route::post('/donators',[\App\Http\Controllers\auth\SingUpController::class,'CreateDonatorsAccount'])->name('createDonators');


/// custom login
Route::get('/dlogin',[\App\Http\Controllers\auth\CustomLoginController::class,'index'])->name('CustomLogin');
Route::post('/dlogin',[\App\Http\Controllers\auth\CustomLoginController::class,'login']);


///PayRoute
Route::post('/pay',[\App\Http\Controllers\Donator\pay\PayController::class,'init'])->name('pay');
Route::get('/pay',[\App\Http\Controllers\Donator\pay\PayController::class,'payCheck']);

////needy login
Route::get('/nlogin',[NeedyLoginController::class,"index"])->name('ٔNeedLogin');
Route::post('/nlogin',[NeedyLoginController::class,"login"]);
