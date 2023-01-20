<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SewaZoom;

class SewaZoomController extends Controller
{
    //
    public function index(){
        $sewazoom = SewaZoom::all();
        // var_dump($sewazoom);
        // die();
        return view('fitur.sewazoom',compact('sewazoom'));
    }

}
