<!-- Modal tambah -->
<div class="modal fade" id="add-aksesprogram-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form pengajuan akses program</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal">
                    <div class="form-body">
                             
                        <input hidden type="text" name="user_id" id="user_id" value="{{Auth::id()}}">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Departement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Department"
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
                                <label>Nama Progam</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Nama Program" id="add-nama_program">
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
                                            <textarea class="form-control" placeholder="" id="add-latar_belakang"
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
                                            <textarea class="form-control" placeholder="" id="add-proses_bisnis"
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
                                            <textarea class="form-control" placeholder="" id="add-sop"
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
                                            <textarea class="form-control" placeholder="" id="add-benefit"
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
                                            <textarea class="form-control" placeholder="" id="add-konsekuensi"
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
                                            <textarea class="form-control" placeholder="" id="add-fitur"
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
                                            <textarea class="form-control" placeholder="" id="add-prosedur_dan_dokumen"
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
                <button type="button" class="btn btn-primary" id="store-aksesprogram">Submit</button>
            </div>
        </div>
    </div>
</div>