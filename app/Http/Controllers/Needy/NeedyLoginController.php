<?php

namespace App\Http\Controllers\Needy;

use App\Http\Controllers\Controller;
use App\Models\Needy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NeedyLoginController extends Controller
{
    public function index()
    {
        return view('needy.login');
    }
    public function login(Request $request)
    {
        if ($user = Needy::whereMobile($request->mobile)->first()) {
            if ($request->password == $user['person_id']) {

                session(['nlogin' => [
                    'expire' => Carbon::now()->addMinutes(90),
                    'id' => $user->id
                ]]);
                return  redirect(route('npanel'));
            }
        }

        alert()->error('ورود به حساب کاربری ناموفق بود ! لطفا مقادیر ورودی را بررسی کنید', 'خطای اعتبار سنجی')->confirmButton('متوجه شدم ');
        return back();
    }
}
