<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SewaZoom;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SewaZoomController extends Controller
{


    public function index(){
        $sewazoom = SewaZoom::with('detailStatus')->where('tanggal','>=', date('Y-m-d H:i:s'))->orderBy('tanggal', 'desc')->get();
        // return $sewazoom;
        return view('fitur.sewazoom',compact('sewazoom'));
    }

    

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'user_id' => 'required',
            'departemen' => 'required',
            'topik' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
            // 'status'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $sewazoom = SewaZoom::create([
            'nama' => $request->nama,
            'user_id'=> $request->user_id,
            'departemen' => $request->departemen,
            'topik'=> $request->topik,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai'=>$request->jam_selesai
            // 'status' => $request->status,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Pengajuan Berhasil Ditambah',
            'data' => $sewazoom
        ]);
    }
    public function show($id)
     {
         
 
         $data = SewaZoom::find($id);
         return response()->json([
             'success' => true,
             'message' => 'Detail Data Post',
             'data'    => $data
         ]); 
     }

    public function update(Request $request, SewaZoom $sewazoom)
     {
        
         //define validation rules
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'departemen' => 'required',
            'topik' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
         ]);
 
         //check if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
 
         //create post
         $sewazoom->find($request->id)->update([

            'nama' => $request->nama,
            'departemen' => $request->departemen,
            'topik'=> $request->topik,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai'=>$request->jam_selesai

         ]);
 
         //return response
         return response()->json([
             'success' => true,
             'message' => 'Data Berhasil Diudapte!',
             'data'    => $sewazoom  
         ]);
     }
     public function destroy($id)
    {
        //delete post by ID
        SewaZoom::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }

    public function update_status($id, Request $request)
    {
        $type = $request->type;
        if($type == "approve"){
            SewaZoom::find($request->id)->update(['status'=>2]);
        }elseif($type == "decline"){
            SewaZoom::find($request->id)->update(['status'=>5]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!.',
        ]); 

    }
}
// Auth::user();