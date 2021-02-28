<?php

namespace App\Http\Controllers\Needy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NeedyPanelController extends Controller
{
    public function index(){
        return view('needy.index');
    }
}
