<?php

namespace App\Http\Controllers\admin\needy;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoorsCreateRequest;
use App\Models\ChildNeedy;
use App\Models\Needy;
use Illuminate\Http\Request;

class NeedyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $needy = Needy::all();
        return view('admin.needy.index',compact('needy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PoorsCreateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Needy::findOrFail($id);
        return view('admin.needy.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Needy::findOrFail($id);
        return view('admin.needy.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->has('is_iranian') ? $is_ir = false : $is_ir = true;
         Needy::whereId($id)->update([
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
        ChildNeedy::whereNeedieId($id)->delete();
        if ($request->has('chilename')){
            $perid = $request->chileid;
            foreach ($request->chilename as $i => $item){
                ChildNeedy::create([
                    'needie_id' => $id,
                    'name'=>$item,
                    'person_id'=>$perid[$i]
                ]);
            }
        }
        alert()->success('اطلاعات  با موفقیت در سامانه بروز شد!','عملیات موفقیت آمیز بود')->confirmButton('متوجه شدم ');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request){
        Needy::whereId($request->id)->delete();
    }
}
