<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesProgram;
use Illuminate\Support\Facades\Validator;

class AksesProgramController extends Controller
{
    //
    public function index(Request $request){
        
        $departemen = $request->departemen;
        $status = $request->status;
        $nama_program = $request->nama_program;
        $akses_program = AksesProgram::with('detailStatus')->where('nama_program','like','%'.$nama_program.'%')
                        ->where('departemen','like','%'.$departemen.'%')->where('status','like','%'.$status.'%')
                        ->orderBy('created_at','desc')->get();
        return view('fitur.aksesprogram',compact('akses_program','departemen','status','nama_program'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
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
        // return $request->all();
        return response()->json([
            'success'=>true,
            'message'=>'Pengajuan Berhasil Ditambah',
            'data'=>$akses_program
        ]);
    }
    public function show($id){
        $data = AksesProgram::find($id);
        return response()->json([
            'success'=>true,
            'message' => 'Detail data',
            'data' => $data
        ]);
    }
    public function update(Request $request, AksesProgram $akses_program, $id){
        $validator = Validator::make($request->all(),[
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
            return response()->json($validator->errors(), 422);
        }
        $akses_program->find($id)->update([
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
            'message'=> 'Data Berhasil Diupdate',
            'data'=> $akses_program
        ]);
    }
    public function destroy($id){
        AksesProgram::where('id', $id)->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Data Berhasil Dihapus!'
        ]);
    }
    public function update_status(Request $request){
        $type = $request->type;
        if ($type == 'accept') {
            AksesProgram::find($request->id)->update(['status'=>3]);
        }elseif ($type == 'decline') {
            AksesProgram::find($request->id)->update(['status'=>5]);
        }elseif ($type == 'end') {
            AksesProgram::find($request->id)->update(['status'=>4]);
        }elseif ($type == 'cancel') {
            AksesProgram::find($request->id)->update(['status'=>6]);
        }
        return response()->json([
            'success'=>true,
            'message'=>'status berhasil diubah!'
        ]);
    }

}
