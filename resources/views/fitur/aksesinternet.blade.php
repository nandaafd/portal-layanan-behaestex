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
            <button class="btn btn-primary" id="btn-add-aksesinternet"><i class="fas fa-plus pe-2"></i>Ajukan</button>
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
                            <div class="input-group">
                                <select class="form-select form-select-sm" name="status" id="filter-status-internet">
                                    <option value="">status..</option>
                                    <option value="1" {{$status==1? 'selected' : '' }}>waiting</option>
                                    <option value="2" {{$status==2? 'selected' : ''}}>approved</option>
                                    <option value="5" {{$status==5? 'selected' : ''}}>decline</option>
                                    <option value="4" {{$status==4? 'selected' : ''}}>end</option>
                                    <option value="6" {{$status==6? 'selected' : ''}}>canceled</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="nama" placeholder="cari nama.." value="{{$nama}}" id="filter-nama-internet">
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="departemen" placeholder="cari departemen.." value="{{$departemen}}" id="filter-departemen-internet">
                        </div>  
                        <div class="col-sm">
                            <input type="button" class="btn btn-secodary btn-sm" value="Reset" onclick="" id="btn-reset-internet">
                            <button class="btn btn-primary btn-sm" id="btn-cari" type="submit"><i class="fas fa-search pe-2"></i>Cari</button>
                        </div>
                    </form>
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
                                @forelse ($akses_internet as $ai)
                                @if (Auth::user()->hak_akses_id == 1)
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
                                        @elseif($ai->status === 4)
                                            <td><span class="badge bg-secondary">{{$ai->detailStatus->nama_status}}</span></td>
                                        @elseif($ai->status === 6)
                                            <td><span class="badge bg-danger">{{$ai->detailStatus->nama_status}}</span></td>
                                        @endif
                                        
                                        <td>
                                            @if(Auth::user()->hak_akses_id == 1)
                                            <button id="btn-status" title="edit status" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">status</button>
                                            <ul class="dropdown-menu" aria-labelledby="btn-status">
                                                @if ($ai->status == 1)
                                                    <li><button class="dropdown-item" id="btn-accept-internet" data-id="{{$ai->id}}"><i class="fas fa-check pe-2"></i>Approve</button></li>
                                                    <li><button class="dropdown-item" id="btn-decline-internet" data-id="{{$ai->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-internet" data-id="{{$ai->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-internet" data-id="{{$ai->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($ai->status == 2)
                                                    <li><button class="dropdown-item" id="btn-decline-internet" data-id="{{$ai->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-internet" data-id="{{$ai->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-internet" data-id="{{$ai->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($ai->status == 5)
                                                    <li><button class="dropdown-item" id="btn-accept-internet" data-id="{{$ai->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-internet" data-id="{{$ai->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-internet" data-id="{{$ai->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($ai->status == 6)
                                                    <li><button class="dropdown-item" id="btn-end-internet" data-id="{{$ai->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                @elseif ($ai->status == 4)  
                                                    <li style="margin-left:10px;">Status tidak dapat diubah</li>
                                                @endif
                                            </ul>
                                                <button id="btn-update-aksesinternet" data-id="{{$ai->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                                <button id="btn-delete-aksesinternet" data-id="{{$ai->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            @else
                                                @if($ai->user_id === Auth::id())
                                                    <button id="btn-update-aksesinternet" data-id="{{$ai->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                                @endif 
                                            @endif   
                                        </td>
                                    </tr>
                                @else
                                    @if (Auth::id() == $ai->user_id)
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
                                        @elseif($ai->status === 4)
                                            <td><span class="badge bg-secondary">{{$ai->detailStatus->nama_status}}</span></td>
                                        @elseif($ai->status === 6)
                                            <td><span class="badge bg-danger">{{$ai->detailStatus->nama_status}}</span></td>
                                        @endif                  
                                        <td>
                                            <button id="btn-update-aksesinternet" data-id="{{$ai->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button> 
                                        </td>
                                    </tr>
                                    @endif
                                @endif                                 
                                @empty
                                    <h5 id="emptydata-info">Tidak ada pengajuan masuk.</h5>
                                @endforelse

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
