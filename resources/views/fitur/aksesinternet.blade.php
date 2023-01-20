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
                    <h5 class="card-subtitle" id="tb-date"></h5>
                </div>
                <div class="card-content">


                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>DEPARTMENT</th>
                                    <th>JABATAN</th>
                                    <th>KEPERLUAN EMAIL</th>
                                    <th>KEPERLUAN BROWSING</th>
                                    <th>STATUS</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($akses_internet as $ai)
                                <tr>
                                    <td class="text-bold-500"><?php echo $no++ ?></td>
                                    <td>{{$ai->nama}}</td>
                                    <td>{{$ai->departemen}}</td>
                                    <td>{{$ai->jabatan}}</td>
                                    <td>{{$ai->keperluan_email}}</td>
                                    <td>{{$ai->keperluan_browsing}}</td>
                                    <td><span class="badge bg-success">{{$ai->status}}</span></td>
                                    <td>
                                        <a href="javascript:void(0)" id="btn-edit" data-id="${response.data.id}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="javascript:void(0)" id="btn-delete" data-id="${response.data.id}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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

<script src="{{asset('js/modals/AksesInternet/modal-view.js')}}"></script>
@endsection
