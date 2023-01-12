<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class RevisiDataController extends Controller
{
    public function index(){
        $revisidata = DB::table('revisi_data')->get();
        return view('fitur.revisidata',['revisidata'=>$revisidata]);
    }
}
