<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RevisiData;
use Illuminate\Support\Facades\Validator;

class RevisiDataController extends Controller
{
    //
    public function index(){
        $revisidata = RevisiData::with('detailStatus')->orderBy('created_at', 'desc')->get();
         return view('fitur.revisidata',compact('revisidata'));
     }

     public function store(Request $request){
         $validator = Validator::make($request->all(),[
            'user_id'=>'required',
             'jenis_revisi'=>'required',
             'tanggal'=>'required',
             'tanggal_data'=>'required',
             'jenis_data'=>'required',
             'nama_data'=>'required',
             'detail_revisi'=>'required',
             'alasan_revisi'=>'required'
         ]);
         if ($validator->fails()) {
             return response()->json($validator->errors(),422);
         }
         $revisidata = RevisiData::create([
            'user_id'=>$request->user_id,
             'jenis_revisi' =>$request->jenis_revisi,
             'tanggal' =>$request->tanggal,
             'tanggal_data' =>$request->tanggal_data,
             'jenis_data' =>$request->jenis_data,
             'nama_data' =>$request->nama_data,
             'detail_revisi' =>$request->detail_revisi,
             'alasan_revisi' =>$request->alasan_revisi,
         ]);
         return response()->json([
             'success' => true,
             'message' => 'Pengajuan Berhasil Ditambah',
             'data' => $revisidata
         ]);
     }
 

     public function show($id)
     {
         
 
         $data = RevisiData::find($id);
         return response()->json([
             'success' => true,
             'message' => 'Detail Data Post',
             'data'    => $data
         ]); 
     }

     public function update(Request $request, $id, RevisiData $revisidata)
     {
        // return 'asu';
         //define validation rules
         $validator = Validator::make($request->all(), [
             'jenis_revisi'=>'required',
             'tanggal'=>'required',
             'tanggal_data'=>'required',
             'jenis_data'=>'required',
             'nama_data'=>'required',
             'detail_revisi'=>'required',
             'alasan_revisi'=>'required',
         ]);
 
         //check if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
 
         //create post
         $revisidata->find($request->id)->update([
             'jenis_revisi' =>$request->jenis_revisi,
             'tanggal' =>$request->tanggal,
             'tanggal_data' =>$request->tanggal_data,
             'jenis_data' =>$request->jenis_data,
             'nama_data' =>$request->nama_data,
             'detail_revisi' =>$request->detail_revisi,
             'alasan_revisi' =>$request->alasan_revisi

         ]);
 
         //return response
         return response()->json([
             'success' => true,
             'message' => 'Data Berhasil Diudapte!',
             'data'    => $revisidata  
         ]);
     }

    //  delete data
     public function destroy($id){
        RevisiData::where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil Dihapus!'
        ]);
     
     }
     public function update_status($id, Request $request){
        $type = $request->type;
        if ($type == "accept") {
            RevisiData::find($request->id)->update(['status'=>3]);
        } elseif($type == "decline") {
            RevisiData::find($request->id)->update(['status'=>5]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Status Berhasil Diupdate!'
        ]);
        
     }
 
}
