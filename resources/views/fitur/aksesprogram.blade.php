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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aksesProgram"
                id="btn-aksesprogram">Ajukan</button>
        </div>
    </div>
</div>



<div class="main">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="tb-tittle">Daftar pengajuan akses program</h4>
                    <h5 class="card-subtitle" id="tb-date"></h5>
                </div>
                <div class="card-content">

                    {{-- Tabel --}}
                    <div class="table-responsive">
                        <table class="table mb-0 text-center table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>DEPARTMENT</th>
                                    <th>NAMA PROGRAM</th>
                                    <th>STATUS</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($akses_programs as $ap)
                                <tr>
                                    <td class="text-bold-500"><?php echo $no++ ?></td>
                                    <td>{{$ap->departemen}}</td>
                                    <td>{{$ap->nama_program}}</td>
                                    <td><span class="badge bg-success">{{$ap->status}}</span></td>
                                    <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#detail" id="btn-detail">Detail</button></td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aksesProgram-edit"
                                        id="btn-aksesprogram"><a href="">edit</a></button></td>
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

<!-- Modal tambah -->
<div class="modal fade" id="aksesProgram" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form pengajuan akses program</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Departement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Department"
                                            id="first-name-icon">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                <path
                                                    d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                <path
                                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Nama Progam</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Nama Program">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-type" viewBox="0 0 16 16">
                                                <path
                                                    d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label>Latar Belakang Pengajuan</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Proses bisnis yang masuk dalam ruang lingkup program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>SOP/IK sebagai dasar proses bisnis</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Benefit yang akan didapatkan dengan program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Konsekuensi atas pembuatan program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Fitur yang diinginkan dalam program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Prosedur dan dokumen terkait</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">

                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal lihat data -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail data pengajuan akses program</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Departement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input readonly type="text" class="form-control" placeholder=""
                                            id="first-name-icon" value="{{$ap->departemen}}">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                <path
                                                    d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                <path
                                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Nama Progam</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input readonly type="text" class="form-control" placeholder="" value="{{$ap->nama_program}}">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-type" viewBox="0 0 16 16">
                                                <path
                                                    d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label>Latar Belakang Pengajuan</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->latar_belakang}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Proses bisnis yang masuk dalam ruang lingkup program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->proses_bisnis}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>SOP/IK sebagai dasar proses bisnis</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->sop}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Benefit yang akan didapatkan dengan program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->benefit}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Konsekuensi atas pembuatan program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->konsekuensi}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Fitur yang diinginkan dalam program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->fitur}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Prosedur dan dokumen terkait</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea readonly class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px">{{$ap->prosedur_dan_dokumen}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="aksesProgram-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Departement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Department"
                                            id="first-name-icon" value="{{$ap->departemen}}">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                <path
                                                    d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                                <path
                                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Nama Progam</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Nama Program" value="{{$ap->nama_program}}">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-type" viewBox="0 0 16 16">
                                                <path
                                                    d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <label>Latar Belakang Pengajuan</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->latar_belakang}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Proses bisnis yang masuk dalam ruang lingkup program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->proses_bisnis}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>SOP/IK sebagai dasar proses bisnis</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->sop}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Benefit yang akan didapatkan dengan program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->benefit}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Konsekuensi atas pembuatan program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->konsekuensi}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Fitur yang diinginkan dalam program SIM</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->fitur}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label>Prosedur dan dokumen terkait</label>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <div class="form">
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2"
                                                style="height: 100px">{{$ap->prosedur_dan_dokumen}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


@endsection
