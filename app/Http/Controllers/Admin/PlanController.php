<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePlanRequest;
use App\Models\DonatorPlan;
use App\Models\NeederPlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Priority;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan  = Plan::all();
        return view('admin.plan.index', compact('plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlanRequest $request)
    {
        $plan = Plan::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => 0
        ]);
        foreach ($request->needy as $nee) {
            NeederPlan::create([
                "plan_id" => $plan->id,
                "needie_id" => $nee
            ]);
        }
        foreach ($request->donators as $nee) {
            DonatorPlan::create([
                "plan_id" => $plan->id,
                "donator_id" => $nee
            ]);
        }
        alert()->success('عملیات با موفقیت انجام شد ');
        return view('admin.plan.priority',compact('plan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('admin.plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {

        $plan->update([
            'status' =>1
        ]);
        foreach (\App\Models\DonatorPlanHelp::where([['plan_id',$plan->id],['money',false]])->get() as $dn)
            if(\App\Models\Donations::whereId($dn->donations_id)->first()->status==1)
                \App\Models\Donations::whereId($dn->donations_id)->first()->update([
                    'status' =>2
                ]);

        foreach (\App\Models\DonatorPlanHelp::where([['plan_id',$plan->id],['money',true]])->get() as $dn)
            if(\App\Models\Receipt::whereId($dn->donations_id)->first()->status==1)
                    \App\Models\Receipt::whereId($dn->donations_id)->first()->update([
                        'status' =>2
                    ]);


            alert()->success('عملیات با موفقیت انجام شد ');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        foreach($request->priority as $pr){
            $ex = explode('&',$pr);
            Priority::create([
                'needie_id'=>$ex[0],
                'priority'=>$ex[1],
                'plan_id'=>$plan->id
            ]);
        }
        alert()->success('عملیات با موفقیت انجام شد ');
        return redirect(route('plan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
    }
}
