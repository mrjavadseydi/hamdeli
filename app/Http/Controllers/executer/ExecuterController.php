<?php

namespace App\Http\Controllers\executer;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\createGroupRequest;
use App\Models\Group;
use App\Models\NeederPlan;
use App\Models\NeedyGroup;
use App\Models\NeedyPlanGroup;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserGroup;

class ExecuterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan  = Plan::all();
        return view('admin.executer.index', compact('plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createGroupRequest $request)
    {
        // dd($request->all());
        $group = Group::create([
            'title' => uniqid(),
            'plan_id'=>$request->id
        ]);
        foreach ($request->user as $u) {
            UserGroup::create([
                'user_id' => $u,
                'group_id' => $group->id
            ]);
        }
        foreach ($request->needy as $n) {
            NeedyGroup::create([
                'needie_id' => $n,
                'group_id' => $group->id
            ]);
            NeedyPlanGroup::create([
                'plan_id'=>$request->id,
                'needie_id' => $n,
                'group_id' => $group->id
            ]);
        }
        return back()->with("success","گروه بندی انجام شد ");

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        // $plan
        $notneedy = NeedyPlanGroup::where([['plan_id', $plan->first()->id]])->pluck('needie_id');
        $needy = NeederPlan::where('plan_id', $plan->first()->id)->whereNotIn('needie_id', $notneedy)->get();
        $user = Permission::where('name', 'user')->get();
        $groups =NeedyPlanGroup::where([['plan_id', $plan->first()->id]])->pluck('group_id');
        $group = Group::whereIn('id',$groups)->get();
        return view('admin.executer.show', compact('needy', 'plan', 'user','group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
