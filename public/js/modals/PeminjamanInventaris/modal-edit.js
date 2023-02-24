$('body').on('click', '#btn-update-inventaris', function () {
    let inventaris = $(this).data('id');
    console.log(inventaris);
    //fetch detail post with ajax
    $.ajax({
        url: `/inventaris/${inventaris}`,
        type: "GET",
        cache: false,
        success:function(response){
            let idField = response.data[1].length;
            console.log(response)
            $('#user_id').val(response.data[0].user_id);
            $('#departemen').val(response.data[0].departemen);
            $('#nama').val(response.data[0].nama);
            $('#tanggal_dipinjam').val(response.data[0].tanggal_pinjam);
            let x = 0;   
            for(let i = 0; i <= idField; i++){
                $('#item'+i).val(response.data[1][i++].master_inventaris_id);
            }
            $(document).ready(function () {
                let x = 0;
                let idField = response.data[1].length;
                let data = response.data[1];
                // let pop = idField.pop();
                var wrapper = $("#dropdown-area"); 
                for(let i = 0; i <= idField; i++){
                        $(wrapper).append($('#dropdown-item').html());
                        $('#item').attr('id','item'+ x)
                        $('#item'+ x).attr('id','item'+ x++)
                } 
                }); 
            //open modal    
            $('#edit-inventaris-modal').modal('show');
        }
    });
});


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
