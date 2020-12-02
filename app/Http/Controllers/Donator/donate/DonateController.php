<?php

namespace App\Http\Controllers\Donator\donate;

use App\Http\Controllers\Controller;
use App\Models\Donations;
use App\Models\Receipt;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (UserDonate()->cooperation_type == "نقدی") {
            $money = Receipt::whereDonatorId(session('login')['id'])->get();
            return view('donator.donate.index', compact('money'));

        } else {
            $donation = Donations::whereDonatorId(session('login')['id'])->get();
            return view('donator.donate.index', compact('donation'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (UserDonate()->cooperation_type == "نقدی") {
            return view('donator.donate.create.money');
        } else {
            return view('donator.donate.create.other');
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
        if ($request->type == "other") {
            Donations::create([
                'status' => 0,
                'description' => $request->description,
                'title' => $request->title,
                'donator_id' => UserDonate()->id
            ]);

        } else {
            Receipt::create([
                'status' => 0,
                'description' => $request->description,
                'tracking' => $request->tracking,
                'amount' => $request->amount,
                'donator_id' => UserDonate()->id
            ]);
        }


        alert()->success('کمک شما با موفقیت ذخیره شد !با تشکر از شما ', 'عملیات موفقیت آمیز بود')->confirmButton('متوجه شدم');
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
