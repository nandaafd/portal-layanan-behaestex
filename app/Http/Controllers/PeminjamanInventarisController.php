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
        $nama = $request->nama;
        $status = $request->status;
        $departemen = $request->departemen;
        $tanggal = $request->tanggal;
        $inventaris = PeminjamanInventaris::with('detailStatus')->with('itemPeminjaman')
                                            ->where('status','like','%'.$status.'%')->where('nama','like','%'.$nama.'%')
                                            ->where('departemen','like','%'.$departemen.'%')->where('tanggal_pinjam','like','%'.$tanggal.'%')
                                            ->orderBy('created_at','desc')->get();
        $master_inventaris = MasterInventaris::all();
        $item_peminjaman = ItemPeminjaman::with('MasterInventaris')->first();
        return view('fitur.inventaris', compact('inventaris', 'master_inventaris','item_peminjaman','nama','departemen','status','tanggal'));
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
            'message'=>'Data peminjaman anda berhasil ditambah!',   
            'data'=>$peminjaman_inventaris
        ]);
    }
    public function show($id){
       $data = PeminjamanInventaris::find($id);
       $item = ItemPeminjaman::with('MasterInventaris')->where('peminjaman_id',$data->id)->get();
       return response()->json([
        'success' => true,
        'message' => 'detail data',
        'data'=> [$data, $item]
       ]);
    }
    public function update(Request $request, PeminjamanInventaris $peminjaman_inventaris, ItemPeminjaman $item_peminjaman){
        // return $request->all;
        $peminjaman_inventaris->find($request->id)->update([
            'nama'=>$request->nama,
            'departemen'=>$request->departemen,
            'tanggal_pinjam'=>$request->tanggal_pinjam
        ]);
        $item_peminjaman->where('peminjaman_id',$peminjaman_inventaris->id)->update([
            'master_inventaris_id'=>$request->item
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => [$peminjaman_inventaris, $item_peminjaman]  
        ]);
    }

    public function destroy($id){
        ItemPeminjaman::where('peminjaman_id',$id)->delete();
        PeminjamanInventaris::where('id',$id)->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Data berhasil dihapus!'
        ]);
    }
    public function update_status(Request $request){
        $type = $request->type;
        if ($type == "approve") {
            PeminjamanInventaris::find($request->id)->update(['status'=>2]);
        } elseif ($type == "decline") {
            PeminjamanInventaris::find($request->id)->update(['status'=>5]);
        }
        elseif ($type == "end") {
            PeminjamanInventaris::find($request->id)->update(['status'=>4]);
        }
        elseif ($type == "cancel") {
            PeminjamanInventaris::find($request->id)->update(['status'=>6]);
        } 
        return response()->json([
            'success'=>true,
            'message'=>'Status Berhasil Diubah',
        ]);
    }
    public function pengembalian(Request $request){
        $pengembalian = $request->type;
        $tanggal = date('Y-m-d');
        if ($pengembalian == 'dikembalikan') {
            PeminjamanInventaris::find($request->id)->update(['status'=>4]);
            PeminjamanInventaris::find($request->id)->update(['tanggal_dikembalikan'=>$tanggal]);
        }
        return response()->json([
            'success'=>true,
            'message'=>'Berhasil Dikembalikan!',
        ]);
    }

}
