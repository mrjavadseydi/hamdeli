<?php

namespace App\Http\Controllers\Donator\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(){
            return view('donator.index');
    }
}
