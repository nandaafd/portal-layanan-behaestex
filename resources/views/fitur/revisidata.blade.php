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
                id="btn-add-revisidata"><i class="fas fa-plus pe-2"></i>Ajukan</button>
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
                            <input class="form-control form-control-sm" type="date" name="tanggal" value="{{$tanggal}}" placeholder="tanggal pengajuan" id="filter-tanggal-rev">
                        </div>
                        <div class="col-sm">
                            <div class="input-group">
                                <select class="form-select form-select-sm" name="status" id="filter-status-rev">
                                    <option value="">status..</option>
                                    <option value="1" {{ $status==1? 'selected' : '' }}>waiting</option>
                                    <option value="3" {{$status==3? 'selected' : ''}}>accepted</option>
                                    <option value="5" {{$status==5? 'selected' : ''}}>decline</option>
                                    <option value="4" {{$status==4? 'selected' : ''}}>end</option>
                                    <option value="6" {{$status==6? 'selected' : ''}}>canceled</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="input-group">
                                <select class="form-select form-select-sm" name="jenis_revisi" id="filter-jenisrevisi-rev">
                                    <option value="">Jenis revisi..</option>
                                    <option value="Sudah Closing" {{ $jenis_revisi=='Sudah Closing'? 'selected' : '' }}>Sudah Closing</option>
                                    <option value="Belum Closing" {{$jenis_revisi=='Belum Closing'? 'selected' : ''}}>Belum Closing</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm">
                            <input class="form-control form-control-sm" type="text" name="nama_data" placeholder="cari nama data.." value="{{$nama_data}}" id="filter-namadata-rev">
                        </div>  
                        <div class="col-sm">
                            <input type="button" class="btn btn-secodary btn-sm" value="Reset" onclick="" id="btn-reset-rev">
                            <button class="btn btn-primary btn-sm" id="btn-cari" type="submit"><i class="fas fa-search pe-2"></i>Cari</button>
                        </div>
                    </form>
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
                                    <th colspan="3">AKSI</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="table-revisidata">
                                @forelse ($revisidata as $rev)
                                @if (Auth::user()->hak_akses_id == 1)
                                <tr id="index_{{ $rev->id }}">
                                    <td>{{$rev->jenis_revisi}}</td>
                                    <td>{{$rev->tanggal}}</td>
                                    <td>{{$rev->tanggal_data}}</td>
                                    <td>{{$rev->jenis_data}}</td>
                                    <td>{{$rev->nama_data}}</td>
                                    @if ($rev->status ==1)
                                        <td><span class="badge bg-warning">{{$rev->detailStatus->nama_status}}</span></td>
                                    @elseif($rev->status ==3)
                                        <td><span class="badge bg-success">{{$rev->detailStatus->nama_status}}</span></td>
                                    @elseif ($rev->status ==5)
                                        <td><span class="badge bg-danger">{{$rev->detailStatus->nama_status}}</span></td>
                                    @elseif ($rev->status ==4)
                                        <td><span class="badge bg-secondary">{{$rev->detailStatus->nama_status}}</span></td>
                                    @elseif ($rev->status ==6)
                                        <td><span class="badge bg-danger">{{$rev->detailStatus->nama_status}}</span></td>
                                    @endif
                                    <td>
                                        @if(Auth::user()->hak_akses_id == 1) 
                                            <button id="btn-status" title="edit status" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">status</button>
                                            <ul class="dropdown-menu" aria-labelledby="btn-status">
                                                @if ($rev->status == 1)
                                                    <li><button class="dropdown-item" id="btn-accept-rev" data-id="{{$rev->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-decline-rev" data-id="{{$rev->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-rev" data-id="{{$rev->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-rev" data-id="{{$rev->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($rev->status == 3)
                                                    <li><button class="dropdown-item" id="btn-decline-rev" data-id="{{$rev->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-rev" data-id="{{$rev->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-rev" data-id="{{$rev->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($rev->status == 5)
                                                    <li><button class="dropdown-item" id="btn-accept-rev" data-id="{{$rev->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-rev" data-id="{{$rev->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-rev" data-id="{{$rev->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($rev->status == 6)
                                                    <li><button class="dropdown-item" id="btn-end-rev" data-id="{{$rev->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>  
                                                @elseif ($rev->status == 4)  
                                                    <li style="margin-left:10px;">Status tidak dapat diubah</li>
                                                @endif
                                            </ul>
                                            <button id="btn-view" data-id="{{$rev->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                                            <button id="btn-update-revisidata" data-id="{{$rev->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                            <button id="btn-delete-revisidata" data-id="{{$rev->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                                        @else
                                            @if(Auth::user()->id === $rev->user_id)
                                                <button id="btn-view" data-id="{{$rev->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                                                <button id="btn-update-revisidata" data-id="{{$rev->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @else
                                    @if (Auth::id() == $rev->user_id)
                                    <tr id="index_{{ $rev->id }}">
                                        <td>{{$rev->jenis_revisi}}</td>
                                        <td>{{$rev->tanggal}}</td>
                                        <td>{{$rev->tanggal_data}}</td>
                                        <td>{{$rev->jenis_data}}</td>
                                        <td>{{$rev->nama_data}}</td>
                                        @if ($rev->status ==1)
                                            <td><span class="badge bg-warning">{{$rev->detailStatus->nama_status}}</span></td>
                                        @elseif($rev->status ==3)
                                            <td><span class="badge bg-success">{{$rev->detailStatus->nama_status}}</span></td>
                                        @elseif ($rev->status ==5)
                                            <td><span class="badge bg-danger">{{$rev->detailStatus->nama_status}}</span></td>
                                        @elseif ($rev->status ==4)
                                            <td><span class="badge bg-secondary">{{$rev->detailStatus->nama_status}}</span></td>
                                        @elseif ($rev->status ==6)
                                            <td><span class="badge bg-danger">{{$rev->detailStatus->nama_status}}</span></td>
                                        @endif
                                        <td>
                                            <button id="btn-view" data-id="{{$rev->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                                            <button id="btn-update-revisidata" data-id="{{$rev->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                                
                                @empty
                                   <h5 id="emptydata-info">Tidak ada pengajuan masuk hari ini.</h5> 
                                @endforelse
                            </tbody>
                        </table>
        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
   
</script>
@include('modals.RevisiData.add_revisidata')
@include('modals.RevisiData.edit_revisidata')

@endsection
@push('js')
<script src="{{ asset('/js/modals/RevisiData/modal-add.js') }}"></script>
<script src="{{ asset('/js/modals/RevisiData/modal-edit.js') }}"></script>
<script src="{{ asset('/js/modals/RevisiData/modal-view.js') }}"></script>
<script src="{{asset('js/modals/RevisiData/delete-revisidata.js')}}"></script> 
@endpush
