<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AksesinternetController extends Controller
{
    //
    public function index(){
        $akses_internet = DB::table('akses_internet')->get();
        return view('fitur.aksesinternet',['akses_internet'=>$akses_internet]);
    }
}
