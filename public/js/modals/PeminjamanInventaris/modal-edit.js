$('body').one('click', '#btn-update-inventaris', function () {
    let inventaris = $(this).data('id');
    console.log(inventaris);
    //fetch detail post with ajax
    $.ajax({
        url: `/inventaris/${inventaris}`,
        type: "GET",
        cache: false,
        success:function(response){
            idField = response.data[1].length;
            var wrapper = $("#dropdown-area");
            let x = 0; 
            let i = 0;
            let a =0;
            console.log(response)
            $('#user_id').val(response.data[0].user_id);
            $('#departemen').val(response.data[0].departemen);
            $('#nama').val(response.data[0].nama);
            $('#tanggal_dipinjam').val(response.data[0].tanggal_pinjam);
              
            do {
                $(wrapper).append($('#dropdown-item').html());
                $('#item').attr('id','item'+ x)
                x++;
            } while (x<idField);

            do {
                $('#item'+a).val(response.data[1][a++].master_inventaris.id);
                i++;
            } while (i<idField);

            //open modal    
            $('#edit-inventaris-modal').modal('show');
        }
    });
});

$('#btn-edit-inventaris').click(function(e) {
    let inventaris = $(this).data('id');
    // setTimeout(() => {
    //     window.location=window.location;
    // }, 1200);4
    let i = 0;
    let a = 0;
    let id = $('#id').val();
    let user_id = $('#user_id').val();
    let nama = $('#nama').val();
    let departemen = $('#departemen').val();
    let tanggal_dipinjam = $('#tanggal_dipinjam').val(); 
    // let item0 = $('#item0').val();
    // let item1 = $('#item1').val();
    // let item2 = $('#item2').val();
    // let item3 = $('#item3').val();
    // let item4 = $('#item4').val();
    // let item5 = $('#item5').val();
 
    let token   = $("meta[name='csrf-token']").attr("content");
    $.ajax({

        url: `/inventaris/${inventaris}`,
        type: "PUT",
        cache: false,   
        data: { 
            'id':id,
            'user_id':user_id,
            'nama':nama,
            'departemen':departemen,
            'tanggal_dipinjam':tanggal_dipinjam,
            // 'master_inventaris_id':item0,
            // 'master_inventaris_id':item1,
            // 'master_inventaris_id':item2,
            // 'master_inventaris_id':item3,
            // 'master_inventaris_id':item4,
            // 'master_inventaris_id':item5,
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
            // let post = `
            //     <tr id="index_${response.data.id}">
            //                         <td class="text-bold-500"><?php echo $no++ ?></td>
            //                         <td>${response.data.nama}</td>
            //                         <td>${response.data.tanggal}</td>
            //                         <td>${response.data.tanggal_data}</td>
            //                         <td>${response.data.jenis_data}</td>
            //                         <td>${response.data.nama_data}</td>
            //                         <td><span class="badge bg-success">${response.data.status}</span></td>
            //                         <td>
            //                             <a href="javascript:void(0)" id="btn-view" data-id="${response.data.id}" class="btn btn-warning btn-sm"
            //                                 title="detail"><i class="bi bi-eye-fill"></i></a>
            //                         </td>
            //                         <td>
            //                             <a href="javascript:void(0)" id="btn-edit" data-id="${response.data.id}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
            //                             <a href="javascript:void(0)" id="btn-delete" data-id="${response.data.id}" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            //                                 <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
            //                               </svg></i></a>
            //                         </td>
            //                     </tr>
            // `;
            
            // //append to post data
            // $(`#index_${response.data.id}`).replaceWith(post);

            // //close modal
            // $('#edit-revisidata-modal').modal('hide');
            

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
})

$('body').on('click', '#btn-accept-inventaris', function () {
    let inventaris_id = $(this).data('id');
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
                //fetch to delete data
                $.ajax({

                    url: `/inventaris/${inventaris_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": inventaris_id,
                        "type": "approve"
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
                    }
                });   
            }
        })
        
});

$('body').on('click', '#btn-decline-inventaris', function () {
    let inventaris_id = $(this).data('id');
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
                //fetch to delete data
                $.ajax({
                    url: `/inventaris/${inventaris_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": inventaris_id,
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
                    }
                });
            }
        })   
});

$('body').on('click', '#btn-cancel-inventaris', function () {
    let inventaris_id = $(this).data('id');
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
                //fetch to delete data
                $.ajax({
                    url: `/inventaris/${inventaris_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": inventaris_id,
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
                    }
                });
            }
        })   
});

$('body').on('click', '#btn-end-inventaris', function () {
    let inventaris_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "proses pengajuan ini telah selesai?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, SELESAI'
        }).then((result) => {
            if (result.isConfirmed) {
                //fetch to delete data
                $.ajax({
                    url: `/inventaris/${inventaris_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": inventaris_id,
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
                    }
                });
            }
        })   
});
