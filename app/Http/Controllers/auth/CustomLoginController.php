<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomLoginRequest;
use App\Models\Donator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomLoginController extends Controller
{
    public function index(){
        return view('donator.login');
    }
    public function login(CustomLoginRequest $request){
        if ($user = Donator::whereMobile($request->mobile)->first()) {
            if (\Hash::check($request->password,$user->password)) {

                session(['login'=>[
                    'expire'=>Carbon::now()->addMinutes(30),
                    'id'=>$user->id
                ]]);
               return  redirect(route('panel'));
            }
        }

            alert()->error('ورود به حساب کاربری ناموفق بود ! لطفا مقادیر ورودی را بررسی کنید','خطای اعتبار سنجی')->confirmButton('متوجه شدم ');
            return back();

    }
    public function logout(){
        session()->flush();
        alert()->info('با موفقیت از حساب کاربری خود خارج شدید ');
        return redirect(url('/'));
    }
}
