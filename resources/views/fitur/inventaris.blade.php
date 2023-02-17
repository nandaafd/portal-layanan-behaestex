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
                    {{-- <form action="" method="get" class="row row-cols-sm-auto g-1">
                        <div class="col-sm">
                            <div class="input-group">
                                <select class="form-select form-select-sm" name="status" id="filter-status-internet">
                                    <option value="">status..</option>
                                    <option value="1" {{$status==1? 'selected' : '' }}>waiting</option>
                                    <option value="3" {{$status==2? 'selected' : ''}}>approved</option>
                                    <option value="5" {{$status==5? 'selected' : ''}}>decline</option>
                                    <option value="4" {{$status==4? 'selected' : ''}}>end</option>
                                    <option value="6" {{$status==6? 'selected' : ''}}>canceled</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="nama" placeholder="cari nama.." value="{{$nama_program}}" id="filter-nama-internet">
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="departemen" placeholder="cari departemen.." value="{{$departemen}}" id="filter-departemen-internet">
                        </div>  
                        <div class="col-sm">
                            <input type="button" class="btn btn-secodary btn-sm" value="Reset" onclick="" id="btn-reset-internet">
                            <button class="btn btn-primary btn-sm" id="btn-cari" type="submit"><i class="fas fa-search pe-2"></i>Cari</button>
                        </div>
                    </form> --}}
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
                                @forelse ($inventaris as $data)
                                    
                               
                                <tr id="index">
                                    <td class="text-bold-500">{{$data->nama}}</td>
                                    <td>{{$data->departemen}}</td>
                                    <td>item</td>
                                    <td>{{$data->tanggal_pinjam}}</td>
                                    <td>{{$data->tanggal_dikembalikan}}</td>
                                    <td><span class="badge bg-warning">tes</span></td>
                                    <td>
                                        <button id="btn-kembalikan" data-id="" class="btn btn-warning btn-sm" title="Kembalikan"><i class="bi bi-capslock-fill"></i></button>
                                        <button id="btn-accept-inventaris" data-id="" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                                        <button id="btn-decline-inventaris" data-id="" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button> 
                                        <button id="btn-update-inventaris" data-id="" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                        <button id="btn-delete-inventaris" data-id="" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </td>                                       
                                </tr>
                                @empty
                                    
                                @endforelse
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