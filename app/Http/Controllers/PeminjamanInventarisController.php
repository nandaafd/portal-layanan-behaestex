<?php

namespace App\Http\Controllers;

use App\Models\ItemPeminjaman;
use App\Models\MasterInventaris;
use App\Models\PeminjamanInventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanInventarisController extends Controller
{
    //
    public function index(Request $request){
        // return $request->all();
        $inventaris = PeminjamanInventaris::with('detailStatus')->with('itemPeminjaman')->get();
        $master_inventaris = MasterInventaris::all();
        $item_peminjaman = ItemPeminjaman::all();
        return view('fitur.inventaris', compact('inventaris', 'master_inventaris','item_peminjaman'));
    }
    public function store(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'nama' => 'required',
            'departemen' => 'required',
            'tanggal_pinjam' => 'required',
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
        $id = $peminjaman_inventaris->id;
        foreach ($request->item as $key => $value) {
            ItemPeminjaman::create([
                'peminjaman_id' =>$id,
                'master_inventaris_id'=>$value
            ]);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Success',
            'data'=>$peminjaman_inventaris
        ]);
    }
    public function show($id){
       $data = PeminjamanInventaris::find($id);
       $item = ItemPeminjaman::where('peminjaman_id',$data->id)->first();
       return response()->json([
        'success' => true,
        'message' => 'detail data',
        'data'=> [$data, $item]
       ]);
    }
    public function update(Request $request, PeminjamanInventaris $peminjaman_inventaris, ItemPeminjaman $item_peminjaman){
        $peminjaman_inventaris->find($request->id)->update([
            'nama'=>$request->nama,
            'departemen'=>$request->departemen,
            'tanggal_pinjam'=>$request->tanggal_pinjam
        ]);
        $item_peminjaman->where('peminjaman_id',$peminjaman_inventaris->id)->update([
            'master_inventaris_id'=>$request->item_peminjaman
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => [$peminjaman_inventaris, $item_peminjaman]  
        ]);
    }

}
