<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonatorsCreateRequest;
use App\Http\Requests\PoorsCreateRequest;
use App\Models\ChildNeedy;
use App\Models\Donator;
use App\Models\Needy;
use Illuminate\Http\Request;

class SingUpController extends Controller
{
    public function CreatePoorsAccount(PoorsCreateRequest $request){
        $request->has('is_iranian') ? $is_ir = false : $is_ir = true;
        $create = Needy::create([
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'is_iranian'=>$is_ir,
            'person_id'=>$request->person_id,
            'bank_info'=>$request->bank_info,
            'address'=>$request->address,
            'status'=>$request->status,
            'leader_status'=>$request->leader_status,
            'introduc'=>$request->introduc
        ]);
        if ($request->has('chilename')){
            $perid = $request->chileid;
            $nesbat = $request->nesbat;
            foreach ($request->chilename as $i => $item){
                ChildNeedy::create([
                    'needie_id' => $create->id,
                    'name'=>$item,
                    'person_id'=>$perid[$i],
                    'nesbat'=>$nesbat[$i]
                ]);
            }
        }
        sms($request->name,$request->mobile);
        alert()->success('اطلاعات شما با موفقیت در سامانه ذخیره شد!','ثبت نام موفقیت آمیز بود')->confirmButton('متوجه شدم ');
        return back();

    }
    public function CreateDonatorsAccount(DonatorsCreateRequest $request){
        $request->has('person_id') ? $pid = $request->person_id : $pid = '';
        $request->has('address') ? $address = $request->address : $address = '';
        Donator::create([
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'person_id'=>$pid,
            'address'=>$address,
            'mobile'=>$request->mobile,
            'cooperation_type'=>$request->type,
            'description' => $request->description
        ]);
        sms($request->name,$request->mobile);
        alert()->success('  اطلاعات شما با موفقیت در سامانه ذخیره شد!','ثبت نام موفقیت آمیز بود')->confirmButton('متوجه شدم ');
        return back();
    }
}
