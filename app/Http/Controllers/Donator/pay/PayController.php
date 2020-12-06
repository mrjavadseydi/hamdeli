<?php

namespace App\Http\Controllers\Donator\pay;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Receipt;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function init(Request $request){
        $response = zarinpal()
            ->amount((($request->amount)/10))
            ->request()
            ->zarin()
            ->callback('https://hamdeli.seydiweb.ir/pay')
            ->description('hamdeli')
            ->send();

        if (!$response->success()) {
            alert()->error($response->error()->message(),'خطا');
            return back();
        }
        Invoice::create([
            'Donator_id'=>UserDonate()->id,
            'amount' => $request->amount,
            'tracking'=> $response->authority()
        ]);

        return $response->redirect();
    }
    public function payCheck(){
        $authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
        $in = Invoice::whereTracking($authority)->first();
        $response = zarinpal()
            ->amount(($in->amount/10))
            ->verification()
            ->authority($authority)
            ->send();

        if (!$response->success()) {
            alert()->error($response->error()->message(),'خطا');
            return redirect(route('panel'));

        }
        Receipt::create([
            'donator_id'=>$in->donator_id,
            'amount' => $in->amount,
            'tracking'=>$response->referenceId(),
            'status'=>1,
            'description'=>"پرداخت توسط زرین پال"
        ]);
        $in->update([
            'status'=>1,
            'reference' =>$response->referenceId()
        ]);
        alert()->success("کد پیگیری شما:  ".$response->referenceId(),'پرداخت موفقیت آمیز')->confirmButton('متوجه شدم');
        return redirect(route('panel'));
    }
}
