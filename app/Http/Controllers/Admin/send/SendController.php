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
        $send = Send::all();
        return view('admin.send.index', compact('send'));
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
            'description' => $request->description,
            'extera_money' => $request->extera_money,
            'extera_description' => $request->extera_description,
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
        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $name = uniqid() . '.' . $file->extension();
                $file->move(public_path() . '/files/', $name);
                SendFile::create([
                    'send_id' => $send->id,
                    'file' => 'files/' . $name
                ]);
            }
        }
        alert()->success('ذخیره اطلاعات اهدا با موفقیت انجام شد !', 'عملیات موفقیت آمیز')->confirmButton('متوجه شدم');
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
        $data = Send::findOrFail($id);
        return view('admin.send.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Send::findOrFail($id);
        return view('admin.send.edit', compact('data'));
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
        $send = Send::whereId($id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'extera_money' => $request->extera_money,
            'extera_description' => $request->extera_description,
        ]);
        SendDetails::whereSendId($id)->delete();
        foreach ($request->resource as $r) {
            $m = explode('-', $r);
            if ($m[0] == 'm') {
                SendDetails::create([
                    'source_type' => 1,
                    'Source_id' => $m[1],
                    'send_id' => $id,
                ]);
                Receipt::whereId($m[1])->update([
                    'status' => 2
                ]);
            } else {
                SendDetails::create([
                    'source_type' => 2,
                    'Source_id' => $m[1],
                    'send_id' => $id,
                ]);
                Donations::whereId($m[1])->update([
                    'status' => 2
                ]);
            }
        }
        SendNeedy::whereSendId($id)->delete();
        foreach ($request->needy as $n) {
            SendNeedy::create([
                'send_id' => $id,
                'needie_id' => $n
            ]);
        }
        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $name = uniqid() . '.' . $file->extension();
                $file->move(public_path() . '/files/', $name);
                SendFile::create([
                    'send_id' => $id,
                    'file' => 'files/' . $name
                ]);
            }
        }
        alert()->success('ویرایش اطلاعات اهدا با موفقیت انجام شد !', 'عملیات موفقیت آمیز')->confirmButton('متوجه شدم');
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

    public function delete(Request $request)
    {
        Send::whereId($request->id)->delete();
    }

    public function DeleteFile($id)
    {
        SendFile::whereId($id)->delete();
        alert()->success("فایل با موفقیت حذف شد !");
        return back();
    }
}
