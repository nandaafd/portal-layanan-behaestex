<div class="modal fade" id="add-inventaris-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Peminjaman Inventaris</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal">
                    <input type="text" hidden name="user_id" id="add-user_id" value="{{Auth::id()}}">
                    <div class="form-body">
                        <div class="row" id="form-area">
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Name"
                                            id="add-nama" name="nama">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Departement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Department" name="departemen"
                                            id="add-departemen">
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
                                <label>Tanggal</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="date" class="form-control" placeholder="" name="tanggal_pinjam" id="tanggal_pinjam">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="">
                                <label>Item Inventaris</label>
                            </div>
                            <div class="col-md-8" id="">
                                {{-- <label for="mytext[]">Item Inventaris</label> --}}
                                <div class="form-group has-icon-right">
                                    <div class="input-group mb-3" id="">
                                        <select class="form-select pilihan" name="item[]">
                                            <option  selected>Pilih inventaris...</option>
                                            @foreach ($master_inventaris as $master)
                                                <option value="{{$master->id}}">{{$master->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4"></div>
                            <div class="col-md-8" id="append-area"></div>
                                              
                        </div>
                    </div>
                </form>
                <div class="row" id="append-item" hidden>  
                    <div class="" id="append-b">
                        <div class="form-group has-icon-right">
                            <div class="input-group mb-3" id="">
                                <select class="form-select pilihan" name="item[]">
                                    <option >Pilih inventaris...</option>
                                    @foreach ($master_inventaris as $master)
                                        <option value="{{$master->id}}">{{$master->nama_barang}}</option>
                                    @endforeach
                                </select>
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end btn-action">
                    <button type="" class="btn btn-primary me-1 mb-1 add_field_button" id="btn-tambah">tambah
                        opsi</button>
                </div>
                <div class="col-md-12">
                    <a href="javascript:void(0)" class="" id="tnc">Baca syarat dan ketentuan </a>
                </div>
                <div class="col-md-12">
                    <p class="d-none" id="snk"><span>Note : </span> Barang yang anda pinjam adalah inventaris perusahaan, 
                        pastikan anda merawat dengan baik, segera mengembalikan inventaris ketika sudah selesai digunakan, 
                        dan inventaris dikembalikan tanpa ada rusak sedikitpun. <br> <a href="javascript:void(0)" class="" id="hide">sembunyikan</a> </p>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="store-inventaris">Submit</button>
            </div>
        </div>
    </div>
</div>
