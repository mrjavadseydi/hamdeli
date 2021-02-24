<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Plan;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){
        $gro = Group::whereIn('id',UserGroup::where('user_id',auth()->id())->pluck('group_id'));
        $group = $gro->get();
        return view('admin.userplan.index',compact('group'));
    }
}
