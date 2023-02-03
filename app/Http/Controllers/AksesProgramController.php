<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesProgram;
use Illuminate\Support\Facades\Validator;

class AksesProgramController extends Controller
{
    //
    public function index(){
        $akses_program = AksesProgram::all();
        return view('fitur.aksesprogram',compact('akses_program'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            // 'user_id' => 'required',
            'departemen' => 'required',
            'nama_program' => 'required',
            'latar_belakang' => 'required',
            'proses_bisnis' => 'required',
            'sop' => 'required',
            'benefit' => 'required',
            'konsekuensi' => 'required',
            'fitur' => 'required',
            'prosedur_dan_dokumen' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $akses_program = AksesProgram::create([
            'user_id' => $request->user_id,
            'departemen'=>$request->departemen,
            'nama_program'=>$request->nama_program,
            'latar_belakang'=>$request->latar_belakang,
            'proses_bisnis'=>$request->proses_bisnis,
            'sop'=>$request->sop,
            'benefit'=>$request->benefit,
            'konsekuensi'=>$request->konsekuensi,
            'fitur'=>$request->fitur,
            'prosedur_dan_dokumen'=>$request->prosedur_dan_dokumen
        ]);
        return response()->json([
            'success'=>true,
            'message'=>'Pengajuan Berhasil Ditambah',
            'data'=>$akses_program
        ]);
    }

}
