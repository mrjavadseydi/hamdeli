<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadGroupFileRequest;
use App\Models\File;
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


    public function show($id){
        $group = Group::findOrFail($id);
        $plan = Plan::whereId($group->plan_id)->first();
        return view('admin.userplan.show',compact('group','plan'));


    }
    public function uploadDoc(UploadGroupFileRequest $request){
        if($request->hasFile('files')){

            foreach($request->file('files') as $file)

            {

                $name = uniqid().'.'.$file->extension();

                $file->move(public_path().'/files/', $name);

                File::create([
                    'group_id'=>$request->id,
                    'file'=>"files/". $name,
                ]);

            }

         }
         return back();

    }
}
