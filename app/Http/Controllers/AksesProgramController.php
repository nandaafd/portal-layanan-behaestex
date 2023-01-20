<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesProgram;

class AksesProgramController extends Controller
{
    //
    public function index(){
        $akses_program = AksesProgram::all();
        return view('fitur.aksesprogram',compact('akses_program'));
    }

}
