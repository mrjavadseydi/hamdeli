<?php

namespace App\Http\Controllers\admin\resource;

use App\Http\Controllers\Controller;
use App\Models\Donations;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $money = Receipt::all();
        $donation = Donations::all();
        return view('admin.resource.index', compact('money', 'donation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('money')) {
            return view('admin.resource.create.money');
        } else {
            return view('admin.resource.create.other');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('type'))
            abort(403);
        if ($request->type =="other") {
            Donations::create([
                'status' => 1,
                'description'=>$request->description,
                'title' => $request->title,
                'donator_id' => $request->donator
            ]);

        }else{
            Receipt::create([
                'status' => 1,
                'description' => $request->description,
                'tracking' => $request->tracking,
                'amount' => $request->amount,
                'donator_id' => $request->donator
            ]);
        }


        alert()->success('دارایی با موفقیت ثبت شد ','عملیات موفقیت آمیز بود')->confirmButton('متوجه شدم');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ex = explode('*',$id);
        $id = $ex[1];
        if ($ex[0]=="money") {
            $data = Receipt::findOrFail($id);
            return view('admin.resource.edit.money',compact('data'));
        }else{
            $data = Donations::findOrFail($id);
            return view('admin.resource.edit.other',compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->has('type'))
            abort(403);
        if ($request->type =="other") {
            Donations::whereId($id)->update([
                'status' => $request->status,
                'description'=>$request->description,
                'title' => $request->title,
            ]);
        }else{
            Receipt::whereId($id)->update([
                'status' => $request->status,
                'description' => $request->description,
                'tracking' => $request->tracking,
                'amount' => $request->amount,
            ]);
        }


        alert()->success('دارایی با موفقیت ویرایش شد ','عملیات موفقیت آمیز بود')->confirmButton('متوجه شدم');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function DeleteDonation(Request $request)
    {
        Donations::whereId($request->id)->delete();
    }

    public function DeleteMoney(Request $request)
    {
        Receipt::whereId($request->id)->delete();

    }
}
