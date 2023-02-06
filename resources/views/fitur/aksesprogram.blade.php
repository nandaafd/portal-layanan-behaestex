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
            <h1 id="tittle">Pengajuan akses program</h1>
        </div>
        <div class="col-3 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-aksesprgram-modal"
                id="btn-add-aksesprogram">Ajukan</button>
        </div>
    </div>
</div>
<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    {{-- Tabel --}}
                    <div class="table-responsive">
                        <table class="table mb-0 text-center table-bordered table-striped table-sm" id="table-aksesprogram">
                            <thead class="thead-dark">
                                <tr>
                                    <th>DEPARTMENT</th>
                                    <th>NAMA PROGRAM</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($akses_program as $ap)
                                <tr id="index__{{$ap->id}}">
                                    <td>{{$ap->departemen}}</td>
                                    <td>{{$ap->nama_program}}</td>
                                    <td><span class="badge bg-success">{{$ap->detailStatus->nama_status}}</span></td>
                                    <td>
                                        <button id="btn-accept-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                                        <button id="btn-decline-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button> 
                                        <button id="btn-view-aksesprogram" data-id="{{$ap->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                                        <button id="btn-update-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                        <button id="btn-delete-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <h5 id="emptydata-info">Tidak ada pengajuan masuk</h5> 
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.AksesProgram.add_aksesprogram')
@include('modals.AksesProgram.edit_aksesprogram')
@include('modals.AksesProgram.view_aksesprogram')
@endsection
@push('js') 
    <script src="{{asset('js/modals/AksesProgram/modal-add.js')}}"></script>
@endpush