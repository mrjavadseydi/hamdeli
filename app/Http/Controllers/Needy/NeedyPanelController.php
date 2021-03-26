<?php

namespace App\Http\Controllers\Needy;

use App\Http\Controllers\Controller;
use App\Models\NeederPlanHelp;
use App\Models\Plan;
use Illuminate\Http\Request;

class NeedyPanelController extends Controller
{
    public function index(){
        return view('needy.index');
    }
    public function need($id){
        $plan = Plan::findOrFail($id);
        return view('needy.send',compact('plan'));
    }
    public function needStore($id,request $request){
        NeederPlanHelp::create([
            'plan_id'=>$id,
            'needie_id'=>needyUser()->id,
            'title'=>$request->title,
            'description' =>$request->description
        ]);
        alert()->success('با موفقیت ثبت شد!');
        return redirect(route('npanel'));
    }
}
