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
            <a href="javascript:void(0)" class="btn btn-primary" id="btn-add-inventaris"><i class="fas fa-plus pe-2"></i>Pinjam</a>
        </div>
    </div>
</div>
<div class="main" id="">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get" class="row row-cols-sm-auto g-1">
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="date" name="tanggal" value="{{$tanggal}}" id="filter-tanggal-inventaris">
                        </div>
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
                            <input class="form-control form-control-sm" type="text" name="nama" placeholder="cari nama.." value="{{$nama}}" id="filter-nama-inventaris">
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="departemen" placeholder="cari departemen.." value="{{$departemen}}" id="filter-departemen-inventaris">
                        </div>  
                        <div class="col-sm">
                            <input type="button" class="btn btn-secodary btn-sm" value="Reset" onclick="" id="btn-reset-inventaris">
                            <button class="btn btn-primary btn-sm" id="btn-cari" type="submit"><i class="fas fa-search pe-2"></i>Cari</button>
                        </div>
                    </form>
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
                                @if (Auth::user()->hak_akses_id == 1)        
                                    <tr id="index__{{$data->id}}">
                                        <td class="text-bold-500">{{$data->nama}}</td>
                                        <td>{{$data->departemen}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" id="btn-view-item" data-id="{{$data->id}}">
                                                Lihat item
                                              </button>
                                        </td>
                                        <td>{{$data->tanggal_pinjam}}</td>
                                        <td>{{$data->tanggal_dikembalikan}}</td>
                                        @if ($data->status ==1)
                                            <td><span class="badge bg-warning">{{$data->detailStatus->nama_status}}</span></td>
                                        @elseif($data->status ==2)
                                            <td><span class="badge bg-success">{{$data->detailStatus->nama_status}}</span></td>
                                        @elseif ($data->status ==5)
                                            <td><span class="badge bg-danger">{{$data->detailStatus->nama_status}}</span></td>
                                        @elseif ($data->status ==4)
                                            <td><span class="badge bg-secondary">{{$data->detailStatus->nama_status}}</span></td>
                                        @elseif ($data->status ==6)
                                            <td><span class="badge bg-danger">{{$data->detailStatus->nama_status}}</span></td>
                                        @endif
                                        <td>
                                            @if(Auth::user()->hak_akses_id == 1) 
                                                <button id="btn-status" title="edit status" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">status</button>
                                                <ul class="dropdown-menu" aria-labelledby="btn-status">
                                                    @if ($data->status == 1)
                                                        <li><button class="dropdown-item" id="btn-accept-inventaris" data-id="{{$data->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                        <li><button class="dropdown-item" id="btn-decline-inventaris" data-id="{{$data->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                        <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                        <li><button class="dropdown-item" id="btn-cancel-inventaris" data-id="{{$data->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                    @elseif ($data->status == 2)
                                                        <li><button class="dropdown-item" id="btn-decline-inventaris" data-id="{{$data->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                        <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                        <li><button class="dropdown-item" id="btn-cancel-inventaris" data-id="{{$data->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                    @elseif ($data->status == 5)
                                                        <li><button class="dropdown-item" id="btn-accept-inventaris" data-id="{{$data->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                        <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                        <li><button class="dropdown-item" id="btn-cancel-inventaris" data-id="{{$data->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                    @elseif ($data->status == 6)
                                                        <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>  
                                                    @elseif ($data->status == 4)  
                                                        <li style="margin-left:10px;">Status tidak dapat diubah</li>
                                                    @endif
                                                </ul>
                                                {{-- <button id="btn-kembalikan" data-id="{{$data->id}}" class="btn btn-warning btn-sm" title="Kembalikan"><i class="bi bi-capslock-fill"></i></button> --}}
                                                <button id="btn-update-inventaris" data-id="{{$data->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                                <button id="btn-delete-inventaris" data-id="{{$data->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>                                        @else
                                                @if(Auth::id() === $data->user_id)
                                                    @if ($data->status == 2)  
                                                        <button id="btn-kembalikan" data-id="{{$data->id}}" class="btn btn-secondary btn-sm" title="Kembalikan"><i class="fas fa-arrow-up pe-2"></i>Kembalikan</button>
                                                    @endif
                                                    <button id="btn-update-inventaris" data-id="{{$data->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                                @endif
                                            @endif
                                        </td>                                       
                                    </tr>
                                    @else
                                        @if (Auth::id() == $data->user_id)
                                        <tr id="index__{{$data->id}}">
                                            <td class="text-bold-500">{{$data->nama}}</td>
                                            <td>{{$data->departemen}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Lihat item
                                                  </button>
                                            </td>
                                            <td>{{$data->tanggal_pinjam}}</td>
                                            <td>{{$data->tanggal_dikembalikan}}</td>
                                            @if ($data->status ==1)
                                                <td><span class="badge bg-warning">{{$data->detailStatus->nama_status}}</span></td>
                                            @elseif($data->status ==2)
                                                <td><span class="badge bg-success">{{$data->detailStatus->nama_status}}</span></td>
                                            @elseif ($data->status ==5)
                                                <td><span class="badge bg-danger">{{$data->detailStatus->nama_status}}</span></td>
                                            @elseif ($data->status ==4)
                                                <td><span class="badge bg-secondary">{{$data->detailStatus->nama_status}}</span></td>
                                            @elseif ($data->status ==6)
                                                <td><span class="badge bg-danger">{{$data->detailStatus->nama_status}}</span></td>
                                            @endif
                                            <td>
                                                @if ($data->status == 2)  
                                                    <button id="btn-kembalikan" data-id="{{$data->id}}" class="btn btn-secondary btn-sm" title="Kembalikan"><i class="fas fa-arrow-up pe-2"></i>Kembalikan</button>
                                                @endif
                                                <button id="btn-update-inventaris" data-id="{{$data->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                            </td>                                       
                                        </tr>
                                    @endif
                                @endif
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
@include('modals.PeminjamanInventaris.view_peminjaman')
@endsection
@push('js')
    <script src="{{asset('js/modals/PeminjamanInventaris/modal-add.js')}}"></script>
    <script src="{{asset('js/modals/PeminjamanInventaris/modal-edit.js')}}"></script>
    <script src="{{asset('js/modals/PeminjamanInventaris/delete-peminjaman.js')}}"></script>
    <script src="{{asset('js/modals/PeminjamanInventaris/pengembalian.js')}}"></script>
    <script src="{{asset('js/modals/PeminjamanInventaris/view-item-peminjaman.js')}}"></script>
@endpush