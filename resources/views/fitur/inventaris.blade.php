@extends('layouts.main');

@section('content')
<header class="header d-flex py-2 py-4">
    <div class="container" id="nav-content">
        <div class="row">
            <div class="col-1">
                <a href="#" class="burger-btn d-flex d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
            <div class="col-10 text-center">
                <h1 id="nav-tittle" class="d-xl-none">PORTAL IT</h1>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-9">
            <h1 id="tittle">Peminjaman Inventaris</h1>
        </div>
        <div class="col-3 text-center">
            <a href="javascript:void(0)" class="btn btn-primary" id="btn-add-inventaris">Pinjam</a>
        </div>
    </div>
</div>
<div class="main" id="">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="tb-tittle">Daftar peminjam inventaris</h4>
                    <h5 class="card-subtitle" id="">{{date('d-m-Y')}}</h5>
                </div>
                <div class="card-content">

                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered table-striped table-sm" id="table-inventaris">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NAMA</th>
                                    <th>DEPARTEMEN</th>
                                    <th>ITEM DIPINJAM</th>
                                    <th>TANGGAL PINJAM</th>
                                    <th>TANGGAL DIKEMBALIKAN</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="index">
                                    <td class="text-bold-500"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><span class="badge bg-warning">tes</span></td>
                                    <td>
                                        <button id="btn-kembalikan" data-id="" class="btn btn-warning btn-sm" title="Kembalikan"><i class="bi bi-capslock-fill"></i></button>
                                        <button id="btn-accept-inventaris" data-id="" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                                        <button id="btn-decline-inventaris" data-id="" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button> 
                                        <button id="btn-update-inventaris" data-id="" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                        <button id="btn-delete-inventaris" data-id="" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </td>                                       
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

@include('modals.PeminjamanInventaris.add_peminjaman')   
@include('modals.PeminjamanInventaris.edit_peminjaman')
@endsection
@push('js')
    <script src="{{asset('js/modals/PeminjamanInventaris/modal-add.js')}}"></script>
@endpush