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
            <div class="col-11 text-center">
                <h1 id="nav-tittle" class=" d-xl-none">PORTAL IT</h1>
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
                    <h5 class="card-subtitle" id="tb-date"></h5>
                </div>
                <div class="card-content">

                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL PINJAM</th>
                                    <th>NAMA</th>
                                    <th>DEPARTEMEN</th>
                                    <th>KETERANGAN</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#pengembalian" id="btn-pengembalian">
                                            Kembalikan
                                        </button>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" id="btn-edit-inventaris" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-inventaris" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
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
