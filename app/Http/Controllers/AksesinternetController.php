<?php

namespace App\Http\Controllers;

use App\Models\AksesInternet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class AksesinternetController extends Controller
{
    //
    public function index(){
        $akses_internet = AksesInternet::all();
        return view('fitur.aksesinternet',compact('akses_internet'));
    }
}
