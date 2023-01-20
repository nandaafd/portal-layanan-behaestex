<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesInternet;

class AksesInternetController extends Controller
{
    //
    public function index(){
        $akses_internet = AksesInternet::all();
        return view('fitur.aksesinternet',compact('akses_internet'));
    }

}
