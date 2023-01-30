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
            <h1 id="tittle">Pengajuan Revisi Data</h1>
        </div>
        <div class="col-3 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=""
                id="btn-add-revisidata">Revisi Data</button>
        </div>
    </div>
</div>



<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="tb-tittle">Daftar pengajuan revisi data</h4>
                    <h5 class="card-subtitle" id="tb-date"></h5>
                </div>
                <div class="card-content">


                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered table-striped table-sm" id="table-revisidata">
                            <thead class="thead-dark">
                                <tr>
                                    <th>JENIS REVISI</th>
                                    <th>TANGGAL</th>
                                    <th>TANGGAL DATA</th>
                                    <th>JENIS DATA</th>
                                    <th>NAMA DATA</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody id="table-revisidata">
                                @foreach ($revisidata as $rev)
                                <tr id="index_{{ $rev->id }}">
                                    <td>{{$rev->jenis_revisi}}</td>
                                    <td>{{$rev->tanggal}}</td>
                                    <td>{{$rev->tanggal_data}}</td>
                                    <td>{{$rev->jenis_data}}</td>
                                    <td>{{$rev->nama_data}}</td>
                                    <td><span class="badge bg-success">{{$rev->detailStatus->nama_status}}</span></td>
                                    <td>
                                        <a href="javascript:void(0)" id="btn-view" data-id="{{$rev->id}}" class="btn btn-warning btn-sm"
                                            title="detail"><i class="bi bi-eye-fill"></i></a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" id="btn-edit" data-id="{{$rev->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="javascript:void(0)" id="btn-delete" data-id="{{$rev->id}}" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                          </svg></i></a>
                                    </td>
                                </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.RevisiData.edit_revisidata')
{{-- @include('modals.RevisiData.add_revisidata') --}}


@endsection
