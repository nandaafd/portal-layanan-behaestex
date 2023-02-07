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
        <div class="col-sm-7">
            <h1 id="tittle">Daftar zoom</h1>
        </div>
        <div class="col-sm-5 text-center">
            <button class="btn btn-info" id="btn-hariini">Hari ini</button>
            <button class="btn btn-warning" id="btn-semua">Semua</button>
            <a href="javascript:void(0)" class="btn btn-primary" id="btn-add-sewazoom">Daftar Zoom</a>
        </div>
    </div>
</div>
<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    {{-- Tabel --}}
                    <div class="table-responsive" id="table-today">
                      
                        @if (Auth::user()->hak_akses_id == 1)
                            <table class="table mb-0 text-center table-bordered table-striped" id="table-sewazoom-admin">
                        @elseif(Auth::user()->hak_akses_id == 2)
                            <table class="table mb-0 text-center table-bordered table-striped" id="table-sewazoom-user">
                        @endif
                                
                            <thead class="thead-dark">  
                                <tr>
                                    <th class="">NAMA</th>
                                    <th class="">DEPARTEMEN</th>
                                    @if (Auth::user()->hak_akses_id == 1)
                                        <th class="">TOPIK</th>
                                    @endif
                                    <th class="">TANGGAL</th>
                                    <th class="">WAKTU MULAI</th>
                                    <th class="">WAKTU SELESAI</th>
                                    <th class="">STATUS</th>
                                    <th class="" colspan="3">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="today">
                                @forelse ($sewazoom_today as $today)
                                <tr id="index_{{ $today->id }}" class="">
                                        <td class="text-bold-500">{{$today->nama}}</td>
                                        <td>{{$today->departemen}}</td>
                                    @if(Auth::user()->hak_akses_id == 1)
                                        <td>{{$today->topik}}</td>
                                    @endif
                                        <td>{{$today->tanggal}}</td>
                                        <td>{{$today->jam_mulai}}</td>
                                        <td>{{$today->jam_selesai}}</td>
                                    @if ($today->status == 1)
                                        <td><span class="badge bg-warning">{{ $today->detailStatus->nama_status }}</span></td>
                                    @elseif($today->status == 2)
                                        <td><span class="badge bg-success">{{ $today->detailStatus->nama_status }}</span></td>
                                    @elseif($today->status == 5)
                                        <td><span class="badge bg-danger">{{ $today->detailStatus->nama_status }}</span></td>
                                    @endif
                                        <td>
                                    @if (Auth::user()->hak_akses_id == 1)
                                        <button id="btn-edit" data-id="{{$today->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                        <button id="btn-delete" data-id="{{$today->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                                        <button id="btn-approve" data-id="{{$today->id}}" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                                        <button id="btn-decline" data-id="{{$today->id}}" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button>
                                    @else
                                        @if(Auth::user()->id == $today->user_id)                                        
                                            <button id="btn-edit" data-id="{{$today->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                        @endif
                                     @endif
                                    </td>  
                                    @empty
                                    @endforelse
                            </tbody>
                            <tbody class="all">
                                @forelse ($sewazoom as $sewa)
                                <tr id="index_{{ $sewa->id }}" class="">
                                        <td class="text-bold-500">{{$sewa->nama}}</td>
                                        <td>{{$sewa->departemen}}</td>
                                    @if(Auth::user()->hak_akses_id == 1)
                                        <td>{{$sewa->topik}}</td>
                                    @endif
                                        <td>{{$sewa->tanggal}}</td>
                                        <td>{{$sewa->jam_mulai}}</td>
                                        <td>{{$sewa->jam_selesai}}</td>
                                    @if ($sewa->status == 1)
                                        <td><span class="badge bg-warning">{{ $sewa->detailStatus->nama_status }}</span></td>
                                    @elseif($sewa->status == 2)
                                        <td><span class="badge bg-success">{{ $sewa->detailStatus->nama_status }}</span></td>
                                    @elseif($sewa->status == 5)
                                        <td><span class="badge bg-danger">{{ $sewa->detailStatus->nama_status }}</span></td>
                                    @elseif($sewa->status == 4)
                                        <td><span class="badge bg-secondary">{{ $sewa->detailStatus->nama_status }}</span></td>
                                    @elseif($sewa->status == 6)
                                        <td><span class="badge bg-danger">{{ $sewa->detailStatus->nama_status }}</span></td>
                                    @endif
                                        <td>
                                    @if (Auth::user()->hak_akses_id == 1)
                                        <button id="btn-status" title="edit status" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">status</button>
                                        <ul class="dropdown-menu" aria-labelledby="btn-status">
                                            <li><button class="dropdown-item" id="btn-approve" data-id="{{$sewa->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                            <li><button class="dropdown-item" id="btn-decline" data-id="{{$sewa->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                            <li><button class="dropdown-item" id="btn-end" data-id="{{$sewa->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                            <li><button class="dropdown-item" id="btn-cancel" data-id="{{$sewa->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                        </ul>
                                        <button id="btn-edit" data-id="{{$sewa->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                        <button id="btn-delete" data-id="{{$sewa->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                                    @else
                                        @if(Auth::user()->id == $sewa->user_id)                                       
                                            <button id="btn-edit" data-id="{{$sewa->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                        @endif
                                     @endif
                                    </td>  
                                    @empty
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.sewazoom.add-sewazoom')
@include('modals.sewazoom.edit-sewazoom')
@endsection
@push('js')
    <script src="{{ asset('js/modals/SewaZoom/modal-add.js') }}"></script>
    <script src="{{asset('js/modals/SewaZoom/modal-edit.js')}}"></script>
    <script src="{{asset('js/modals/SewaZoom/delete-sewazoom.js')}}"></script>
@endpush