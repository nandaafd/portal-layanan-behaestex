<?php

namespace App\Http\Controllers;


use App\Models\PeminjamanInventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanInventarisController extends Controller
{
    //
    public function index(Request $request){
        // return $request->all();
        $inventaris = PeminjamanInventaris::with('MasterInventaris')->get();
        return view('fitur.inventaris', compact('inventaris'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'nama' => 'required',
            'departemen' => 'required',
            'tanggal_pinjam' => 'required',
            // 'tanggal_dikembalikan' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $peminjaman_inventaris = PeminjamanInventaris::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'departemen' => $request->departemen,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
        ]);
        return response()->json([
            'success'=>true,
            'message'=>'Success',
            'data'=>$peminjaman_inventaris
        ]);
    }
}
