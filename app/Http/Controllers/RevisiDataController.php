<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RevisiData;



class RevisiDataController extends Controller
{
    public function index(){
       $revisidata = RevisiData::all();
        return view('fitur.revisidata',compact('revisidata'));
    }
    
}
