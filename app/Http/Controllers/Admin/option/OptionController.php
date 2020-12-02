<?php

namespace App\Http\Controllers\admin\option;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.option.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.option.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Info::create([
            'date'=>$request->date,
            'type'=>$request->type,
            'description'=>$request->description
        ]);
        alert()->success('اطلاع رسانی در پنل خیرین قرار گرفت','عملیات موفقیت آمیز')->confirmButton('متوجه شدم ');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        foreach ($request->all() as $key =>  $val){
            if ($tr = Option::whereOption($key)->first()) {
                $tr->update([
                    'description'=>$val
                ]);
            }

        }
        alert()->success('تغییرات باموفقیت در سایت اعمال شد ','عملیات موفقیت آمیز')->confirmButton('متوجه شدم ');
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
}
