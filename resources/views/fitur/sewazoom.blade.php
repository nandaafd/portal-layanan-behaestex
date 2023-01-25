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
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    
                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table mb-0 text-center table-bordered" id="table-sewazoom">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>DEPARTEMEN</th>
                                    <th>WAKTU MULAI</th>
                                    <th>WAKTU SELESAI</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($sewazoom as $sewa)
                                <tr id="index_{{ $sewa->id }}">
                                    <td class="text-bold-500"> <?php echo $no++ ?></td>
                                    <td>{{$sewa->nama}}</td>
                                    <td>{{$sewa->departemen}}</td>
                                    <td>{{$sewa->jam_mulai}}</td>
                                    <td>{{$sewa->jam_selesai}}</td>
                                    <td><span class="badge bg-success">{{$sewa->status}}</span></td>
                                    <td>
                                        <a href="javascript:void(0)" id="btn-edit" data-id="{{$sewa->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="javascript:void(0)" id="btn-delete" data-id="{{$sewa->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
@include('modals.sewazoom.add-sewazoom')
@include('modals.sewazoom.edit-sewazoom')


@endsection
