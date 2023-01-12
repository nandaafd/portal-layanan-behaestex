<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AksesProgram;



class AksesProgramController extends Controller
{
    //
    public function index(){
        $akses_programs = DB::table('akses_programs')->get();
        return view('fitur.aksesprogram',['akses_programs'=>$akses_programs]);
    }
}
