<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RevisiData;
use Illuminate\Support\Facades\Validator;



class RevisiDataController extends Controller
{
    public function index(){
       $revisidata = RevisiData::all();
        return view('fitur.revisidata',compact('revisidata'));
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
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
            'jenis_revisi' =>$request->jenis_revisi,
            'tanggal' =>$request->tanggal,
            'tanggal_data' =>$request->tanggal_data,
            'jenis_data' =>$request->jenis_data,
            'nama_data' =>$request->nama_data,
            'detail_revisi' =>$request->detail_revisi,
            'alasan_revisi' =>$request->alasan_revisi
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Pengajuan Berhasil Ditambah',
            'data' => $revisidata
        ]);
    }

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show(RevisiData $revisidata)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $revisidata  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, RevisiData $revisidata)
    {
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
        $revisidata->update([
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
    
}
