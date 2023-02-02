<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesInternet;
use Illuminate\Support\Facades\Validator;

class AksesInternetController extends Controller
{
    //
    public function index(){
        $akses_internet = AksesInternet::with('detailStatus')->orderBy('created_at', 'desc')->get();
        return view('fitur.aksesinternet',compact('akses_internet'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'nama'=>'required',
            'departemen'=>'required',
            'jabatan'=>'required',
            'keperluan_email'=>'required',
            'keperluan_browsing'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $akses_internet = AksesInternet::create([
            'user_id'=>$request->user_id,
            'nama'=>$request->nama,
            'departemen'=>$request->departemen,
            'jabatan'=>$request->jabatan,
            'keperluan_email'=>$request->keperluan_email,
            'keperluan_browsing'=>$request->keperluan_browsing,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Pengajuan Berhasil Ditambah',
            'data' => $akses_internet
        ]);
    }
    public function show($id){
        $data = AksesInternet::find($id);
        return response()->json([
            'success'=>true,
            'message'=>'Detail Data',
            'data'=>$data
        ]);
    }
    public function update(Request $request, AksesInternet $aksesInternet, $id){
        $validator = Validator::make($request->all(),[
            // 'user_id'=>'required',
            'nama'=>'required',
            'departemen'=>'required',
            'jabatan'=>'required',
            'keperluan_email'=>'required',
            'keperluan_browsing'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $aksesInternet->where('id', $id)->update([
            // 'user_id'=>$request->user_id,
            'nama'=>$request->nama,
            'departemen'=>$request->departemen,
            'jabatan'=>$request->jabatan,
            'keperluan_email'=>$request->keperluan_email,
            'keperluan_browsing'=>$request->keperluan_browsing,
        ]);
        return response()->json([
            'success'=>true,
            'message'=>'Data Pengajuan Berhasil Diupdate!',
            'data'=>$aksesInternet
        ]);
    }
    public function destroy($id){
        AksesInternet::where('id',$id)->delete();
        return response()->json([   
            'success'=>true,
            'message'=>'Data berhasil dihapus!'
        ]);
    }
    public function update_status(Request $request){
        $type = $request->type;
        if ($type == "approve") {
            AksesInternet::find($request->id)->update(['status'=>2]);
        } elseif ($type == "decline") {
            AksesInternet::find($request->id)->update(['status'=>5]);
        } 
        return response()->json([
            'success'=>true,
            'message'=>'Status Berhasil Diubah',
        ]);
    }

}
