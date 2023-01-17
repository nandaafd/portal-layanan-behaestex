<?php

namespace App\Http\Controllers;

use App\Models\SewaZoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class SewaZoomController extends Controller
{
    //
    public function index(){
        $sewazoom = SewaZoom::all();
        return view('fitur.sewazoom',compact('sewazoom'));
    }
}
