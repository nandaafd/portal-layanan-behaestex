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
            <h1 id="tittle">Pengajuan Akses internet</h1>
        </div>
        <div class="col-3 text-center">
            <a href="javascript:void(0)" class="btn btn-primary" id="btn-add-aksesinternet">Ajukan</a>
        </div>
    </div>
</div>

<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="tb-tittle">Daftar pengajuan</h4>
                    <h5 class="card-subtitle">{{date('d-m-Y')}}</h5>
                </div>
                <div class="card-content">
                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered table-striped table-sm" id="table-aksesinternet">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NAMA</th>
                                    <th>DEPARTMENT</th>
                                    <th>JABATAN</th>
                                    <th>KEPERLUAN EMAIL</th>
                                    <th>KEPERLUAN BROWSING</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akses_internet as $ai)
                                <tr id="index__{{$ai->id}}">
                                    <td>{{$ai->nama}}</td>
                                    <td>{{$ai->departemen}}</td>
                                    <td>{{$ai->jabatan}}</td>
                                    <td>{{$ai->keperluan_email}}</td>
                                    <td>{{$ai->keperluan_browsing}}</td>
                                    @if($ai->status === 1)
                                        <td><span class="badge bg-warning">{{$ai->detailStatus->nama_status}}</span></td>
                                    @elseif ($ai->status === 2)
                                    <td><span class="badge bg-success">{{$ai->detailStatus->nama_status}}</span></td>
                                    @elseif($ai->status === 5)
                                    <td><span class="badge bg-danger">{{$ai->detailStatus->nama_status}}</span></td>
                                    @endif
                                    
                                    <td>
                                        @if(Auth::user()->hak_akses_id == 1)
                                            <button id="btn-accept-internet" data-id="{{$ai->id}}" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                                            <button id="btn-decline-internet" data-id="{{$ai->id}}" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button> 
                                            <button id="btn-update-aksesinternet" data-id="{{$ai->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                            <button id="btn-delete-aksesinternet" data-id="{{$ai->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        @else
                                            @if($ai->user_id === Auth::id())
                                                <button id="btn-update-aksesinternet" data-id="{{$ai->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                            @endif 
                                        @endif   
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

@include('modals.AksesInternet.add_aksesinternet')
@include('modals.AksesInternet.edit_aksesinternet')

@endsection
@push('js')
<script src="{{ asset('/js/modals/AksesInternet/modal-add.js')}}"></script>
<script src="{{ asset('/js/modals/AksesInternet/modal-edit.js')}}"></script>
<script src="{{ asset('/js/modals/AksesInternet/delete-aksesinternet.js')}}"></script>
@endpush
