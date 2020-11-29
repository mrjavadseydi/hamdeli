<?php

namespace App\Http\Controllers\admin\send;

use App\Http\Controllers\Controller;
use App\Models\Donations;
use App\Models\Receipt;
use App\Models\Send;
use App\Models\SendDetails;
use App\Models\SendFile;
use App\Models\SendNeedy;
use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.send.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $send = Send::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description
        ]);
        foreach ($request->resource as $r) {
            $m = explode('-', $r);
            if ($m[0] == 'm') {
                SendDetails::create([
                    'source_type' => 1,
                    'Source_id' => $m[1],
                    'send_id' => $send->id,
                ]);
                Receipt::whereId($m[1])->update([
                    'status' => 2
                ]);
            } else {
                SendDetails::create([
                    'source_type' => 2,
                    'Source_id' => $m[1],
                    'send_id' => $send->id,
                ]);
                Donations::whereId($m[1])->update([
                    'status' => 2
                ]);
            }
        }
        foreach ($request->needy as $n) {
            SendNeedy::create([
                'send_id' => $send->id,
                'needie_id' => $n
            ]);
        }
        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $file)
            {
                $name = uniqid().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);
                SendFile::create([
                    'send_id' => $send->id,
                    'file'=> 'files/'. $name
                ]);
            }
        }
        alert()->success('ذخیره اطلاعات اهدا با موفقیت انجام شد !','عملیات موفقیت آمیز')->confirmButton('متوجه شدم');
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
        //
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
        //
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
}
