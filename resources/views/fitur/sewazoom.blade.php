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
            <h1 id="tittle">Sewa room zoom</h1>
        </div>
        <div class="col-3 text-center">
            <a href="javascript:void(0)" class="btn btn-primary" id="btn-add-sewazoom">Sewa Zoom</a>
        </div>
    </div>
</div>



<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="tb-tittle">Meeting Lists</h4>
                    <h5 class="card-subtitle" id="tb-date"></h5>
                </div>
                <div class="card-content">
                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered table-striped table-sm" id="table-sewazoom">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th class="th-sm">NAMA</th>
                                    <th class="th-sm">DEPARTEMEN</th>
                                    @if (Auth::user()->hak_akses_id == 1)
                                    <th class="th-sm">TOPIK</th>
                                    @endif
                                    <th class="th-sm">TANGGAL</th>
                                    <th class="th-sm">WAKTU MULAI</th>
                                    <th class="th-sm">WAKTU SELESAI</th>
                                    <th class="th-sm">STATUS</th>
                                    @if(Auth::user()->hak_akses_id == 1)
                                    <th class="th-sm">ACTION</th>
                                    <th class="th-sm">OPSI</th>
                                    @endif
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($sewazoom as $sewa)
                                <tr id="index_{{ $sewa->id }}">
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
                                    @endif
                                    @if (Auth::user()->hak_akses_id == 1)
                                    <td>
                                        <a href="javascript:void(0)" id="btn-edit" data-id="{{$sewa->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        <a href="javascript:void(0)" id="btn-delete" data-id="{{$sewa->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></a>
                                    </td>
                           
                                    <td>
                                        <a href="javascript:void(0)" id="btn-approve" data-id="{{$sewa->id}}" class="btn btn-primary btn-sm" title="Approved"><i class="bi bi-check"></i></a>
                                        <a href="javascript:void(0)" id="btn-decline" data-id="{{$sewa->id}}" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></a>
                                    </td>                                       
                               
                                    @endif
                                    
                                @endforeach
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
