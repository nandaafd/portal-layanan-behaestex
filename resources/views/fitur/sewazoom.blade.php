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
        <div class="col-sm-9">
            <h1 id="tittle">Daftar zoom</h1>
        </div>
        <div class="col-sm-3 text-center">
            <a href="javascript:void(0)" class="btn btn-primary" id="btn-add-sewazoom"><i class="fas fa-plus pe-2"></i> Daftar</a>
        </div>
    </div>
</div>
<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get" class="row row-cols-sm-auto g-1">
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="date" name="tanggal">
                        </div>
                        <div class="col-sm">
                            <div class="input-group">
                                <select class="form-select form-select-sm" name="status" id="">
                                    <option value="">Status..</option>
                                    <option value="1">waiting</option>
                                    <option value="2">approved</option>
                                    <option value="5">decline</option>
                                    <option value="4">end</option>
                                    <option value="6">canceled</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="nama" placeholder="cari nama..">
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="departemen" placeholder="cari departemen..">
                        </div>
                        <div class="col-sm">
                            <button class="btn btn-primary btn-sm" id="btn-cari" type="submit"><i class="fas fa-search pe-2"></i>Cari</button>
                        </div>
                    </form>
                </div>
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
                            <tbody class="">
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
                                            @if ($sewa->status == 1)
                                            <li><button class="dropdown-item" id="btn-approve" data-id="{{$sewa->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                            <li><button class="dropdown-item" id="btn-decline" data-id="{{$sewa->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                            <li><button class="dropdown-item" id="btn-end" data-id="{{$sewa->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                            <li><button class="dropdown-item" id="btn-cancel" data-id="{{$sewa->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                            @elseif ($sewa->status == 2)
                                            <li><button class="dropdown-item" id="btn-decline" data-id="{{$sewa->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                            <li><button class="dropdown-item" id="btn-end" data-id="{{$sewa->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                            <li><button class="dropdown-item" id="btn-cancel" data-id="{{$sewa->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                            @elseif ($sewa->status == 5)
                                            <li><button class="dropdown-item" id="btn-approve" data-id="{{$sewa->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                            <li><button class="dropdown-item" id="btn-end" data-id="{{$sewa->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                            <li><button class="dropdown-item" id="btn-cancel" data-id="{{$sewa->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                            @elseif ($sewa->status == 6)
                                            <li><button class="dropdown-item" id="btn-end" data-id="{{$sewa->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>  
                                            @elseif ($sewa->status == 4)  
                                            <li style="margin-left:10px;">Status tidak dapat diubah</li>
                                            @endif
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