<?php

namespace App\Http\Controllers\admin\donators;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDonatorAccountRequest;
use App\Models\Donator;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class DonatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donate = Donator::all();
        return view('admin.donate.index',compact('donate'));
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
    public function store(Request $request)
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
        $user = Donator::findOrFail($id);
        return view('admin.donate.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Donator::findOrFail($id);
        return view('admin.donate.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonatorAccountRequest $request, $id)
    {
        $request->has('person_id') ? $pid = $request->person_id : $pid = '';
        $request->has('address') ? $address = $request->address : $address = '';
        $request->has('password') ? $password = bcrypt($request->password) :$password = null;
        if (!isNull($password)) {
            Donator::whereId($id)->update([
                'name'=>$request->name,
                'password'=>$password,
                'person_id'=>$pid,
                'address'=>$address,
                'mobile'=>$request->mobile,
                'cooperation_type'=>$request->type,
                'description' => $request->description
            ]);
        }else{
            Donator::whereId($id)->update([
                'name'=>$request->name,
                'person_id'=>$pid,
                'address'=>$address,
                'mobile'=>$request->mobile,
                'cooperation_type'=>$request->type,
                'description' => $request->description
            ]);
        }
        alert()->success('  اطلاعات خیر با موفقیت در سامانه ویرایش شد!','ویرایش موفقیت آمیز بود')->confirmButton('متوجه شدم ');
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
        Donator::whereId($request->id)->delete();
    }

}
