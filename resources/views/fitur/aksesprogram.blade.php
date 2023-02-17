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
                id="btn-add-aksesprogram"><i class="fas fa-plus pe-2"></i>Ajukan</button>
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
                    </form>
                </div>
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
                                    @if ($ap->status == 1)
                                        <td><span class="badge bg-warning">{{$ap->detailStatus->nama_status}}</span></td>
                                    @elseif ($ap->status == 3)
                                        <td><span class="badge bg-success">{{$ap->detailStatus->nama_status}}</span></td>
                                    @elseif ($ap->status == 4)
                                        <td><span class="badge bg-secondary">{{$ap->detailStatus->nama_status}}</span></td>
                                    @elseif ($ap->status == 5)
                                        <td><span class="badge bg-danger">{{$ap->detailStatus->nama_status}}</span></td>
                                    @elseif ($ap->status == 6)
                                        <td><span class="badge bg-danger">{{$ap->detailStatus->nama_status}}</span></td>
                                    @endif
                                    <td>
                                        @if(Auth::user()->hak_akses_id == 1) 
                                            <button id="btn-status" title="edit status" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">status</button>
                                            <ul class="dropdown-menu" aria-labelledby="btn-status">
                                                @if ($ap->status == 1)
                                                    <li><button class="dropdown-item" id="btn-accept-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-decline-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($ap->status == 3)
                                                    <li><button class="dropdown-item" id="btn-decline-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($ap->status == 5)
                                                    <li><button class="dropdown-item" id="btn-accept-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($ap->status == 6)
                                                    <li><button class="dropdown-item" id="btn-end-aksesprogram" data-id="{{$ap->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>  
                                                @elseif ($ap->status == 4)  
                                                    <li style="margin-left:10px;">Status tidak dapat diubah</li>
                                                @endif
                                            </ul>
                                            <button id="btn-view-aksesprogram" data-id="{{$ap->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                                            <button id="btn-update-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                            <button id="btn-delete-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                                        @else
                                            @if(Auth::user()->id === $ap->user_id)
                                                <button id="btn-view-aksesprogram" data-id="{{$ap->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                                                <button id="btn-update-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                            @endif
                                        @endif
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
    <script src="{{asset('js/modals/AksesProgram/modal-edit.js')}}"></script>
    <script src="{{asset('js/modals/AksesProgram/modal-view.js')}}"></script>
    <script src="{{asset('js/modals/AksesProgram/delete-aksesprogram.js')}}"></script>
@endpush