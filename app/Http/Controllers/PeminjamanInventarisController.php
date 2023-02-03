<?php

namespace App\Http\Controllers;


use App\Models\PeminjamanInventaris;
use Illuminate\Http\Request;

class PeminjamanInventarisController extends Controller
{
    //
    public function index(){
        $peminjaman_inventaris = PeminjamanInventaris::all();
        return view('fitur.inventaris', compact('aksesprogram'));
    }
}
