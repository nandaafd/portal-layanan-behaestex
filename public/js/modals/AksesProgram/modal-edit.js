$('body').on('click', '#btn-update-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    //fetch detail post with ajax
    $.ajax({
        url: `/aksesprogram/${aksesprogram_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#id').val(response.data.id);
            $('#user_id').val(response.data.user_id);
            $('#departemen').val(response.data.departemen);
            $('#nama_program').val(response.data.nama_program);
            $('#latar_belakang').val(response.data.latar_belakang);
            $('#proses_bisnis').val(response.data.proses_bisnis);
            $('#sop').val(response.data.sop);
            $('#benefit').val(response.data.benefit);
            $('#konsekuensi').val(response.data.konsekuensi);
            $('#fitur').val(response.data.fitur);
            $('#prosedur_dan_dokumen').val(response.data.prosedur_dan_dokumen);
            $('#status').val(response.data.status);

            //open modal
            $('#edit-aksesprogram-modal').modal('show');
        }
    });
});

$('#btn-edit-aksesprogram').click(function(e) {
    e.paksesprogramentDefault();
    
    //define variable
    let ap_id = $('#id').val();
    let user_id = $('#user_id').val();
    let departemen = $('#departemen').val();
    let nama_program = $('#nama_program').val();
    let latar_belakang = $('#latar_belakang').val();
    let proses_bisnis = $('#proses_bisnis').val();
    let sop = $('#sop').val();
    let benefit = $('#benefit').val();
    let konsekuensi = $('#konsekuensi').val();
    let fitur = $('#fitur').val();
    let prosedur_dan_dokumen = $('#prosedur_dan_dokumen').val();
    let token   = $("meta[name='csrf-token']").attr("content");
    console.log(ap_id)
    //auto refresh page
    // setTimeout(() => {
    //     window.location=window.location;
    // }, 1200);

    //ajax
    $.ajax({

        url: `/aksesprogram/${ap_id}`,
        type: "PUT",
        cache: false,   
        data: { 
            'user_id':user_id,
            'departemen':departemen,
            'nama_program':nama_program,
            'latar_belakang':latar_belakang,
            'proses_bisnis':proses_bisnis,
            'sop':sop,
            'benefit':benefit,
            'konsekuensi':konsekuensi,
            'fitur':fitur,
            'prosedur_dan_dokumen':prosedur_dan_dokumen,
            "_token": token
        },
        success:function(response){
            console.log(response)
            //show success message
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 3000
            });

            //data post
            let post = `
            <tr id="index__${response.data.id}">
            <td>${response.data.departemen}</td>
            <td>${response.data.nama_program}</td>
            <td><span class="badge bg-success">{{$ap->detailStatus->nama_status}}</span></td>
            <td>
                <button id="btn-accept-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                <button id="btn-decline-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button> 
                <button id="btn-view-aksesprogram" data-id="{{$ap->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                <button id="btn-update-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                <button id="btn-delete-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
            </td>
            </tr>
            `;
            
            //append to post data
            $(`#index_${response.data.id}`).replaceWith(post);

            //close modal
            $('#edit-aksesprogram-modal').modal('hide');
            

        },
        // error:function(error){
            
        //     if(error.responseJSON.nama[0]) {

        //         //show alert
        //         $('#alert-nama-edit').removeClass('d-none');
        //         $('#alert-nama-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-nama-edit').html(error.responseJSON.nama[0]);
        //     } 

        //     if(error.responseJSON.nim[0]) {

        //         //show alert
        //         $('#alert-nim-edit').removeClass('d-none');
        //         $('#alert-nim-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-nim-edit').html(error.responseJSON.nim[0]);
        //     } 

        // }

    });

});


$('body').on('click', '#btn-decline-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "ingin menolak pengajuan ini?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, TOLAK'
        }).then((result) => {
            if (result.isConfirmed) {

                  //auto refresh page
                setTimeout(() => {
                    window.location=window.location;
                }, 1200);

                //fetch to delete data
                $.ajax({

                    url: `/aksesprogram/${aksesprogram_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": aksesprogram_id,
                        "type": "decline"
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(() => {
                            window.location=window.location;
                        }, 1200);

                        //remove post on table
                        // $(`#index_${aksesprogram_id}`).remove();
                    }
                });

                
            }
        })
        
});

$('body').on('click', '#btn-accept-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "ingin menerima pengajuan ini?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, TERIMA'
        }).then((result) => {
            if (result.isConfirmed) {

                  //auto refresh page
                setTimeout(() => {
                    window.location=window.location;
                }, 1200);

                //fetch to delete data
                $.ajax({

                    url: `/aksesprogram/${aksesprogram_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": aksesprogram_id,
                        "type": "accept"
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(() => {
                            window.location=window.location;
                        }, 1200);

                        //remove post on table
                        // $(`#index_${aksesprogram_id}`).remove();
                    }
                });

                
            }
        })
        
});

$('body').on('click', '#btn-cancel-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "ingin membatalkan pengajuan ini?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, BATALKAN'
        }).then((result) => {
            if (result.isConfirmed) {

                  //auto refresh page
                setTimeout(() => {
                    window.location=window.location;
                }, 1200);

                //fetch to delete data
                $.ajax({

                    url: `/aksesprogram/${aksesprogram_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": aksesprogram_id,
                        "type": "cancel"
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(() => {
                            window.location=window.location;
                        }, 1200);

                        //remove post on table
                        // $(`#index_${aksesprogram_id}`).remove();
                    }
                });

                
            }
        })
        
});

$('body').on('click', '#btn-end-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "pengajuan ini telah selesai?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, SELESAI'
        }).then((result) => {
            if (result.isConfirmed) {

                  //auto refresh page
                setTimeout(() => {
                    window.location=window.location;
                }, 1200);

                //fetch to delete data
                $.ajax({

                    url: `/aksesprogram/${aksesprogram_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": aksesprogram_id,
                        "type": "end"
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(() => {
                            window.location=window.location;
                        }, 1200);

                        //remove post on table
                        // $(`#index_${aksesprogram_id}`).remove();
                    }
                });

                
            }
        })
        
});