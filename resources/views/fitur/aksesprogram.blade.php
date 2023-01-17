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
                <div class="card-header">
                    <h4 class="card-title" id="tb-tittle">Daftar pengajuan akses program</h4>
                    <h5 class="card-subtitle" id="tb-date"></h5>
                </div>
                <div class="card-content">

                    {{-- Tabel --}}
                    <div class="table-responsive">
                        <table class="table mb-0 text-center table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>DEPARTMENT</th>
                                    <th>NAMA PROGRAM</th>
                                    <th>STATUS</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                                   $no = 1;
                               @endphp
                               @foreach ($akses_program as $ap)
                             
                                <tr>
                                    <td class="text-bold-500">@php
                                       echo $no++;
                                    @endphp</td>
                                    <td>{{$ap->departemen}}</td>
                                    <td>{{$ap->nama_program}}</td>
                                    <td>{{$ap->status}}<span class="badge bg-success"></span></td>
                                    <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#detail" id="btn-view-aksesprogram">Detail</button></td>
                                    <td>
                                        <a href="javascript:void(0)" id="btn-edit-aksesprogram" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-aksesprogram" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
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

@include('modals.AksesProgram.add_aksesprogram')
@include('modals.AksesProgram.edit_aksesprogram')
@include('modals.AksesProgram.view_aksesprogram')


@endsection
