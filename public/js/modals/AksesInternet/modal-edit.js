$('body').on('click','#btn-update-aksesinternet', function () {
    let internet_id = $(this).data('id');
    console.log(internet_id)
    $.ajax({
        url: `/aksesinternet/${internet_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#id').val(response.data.id);
            $('#user_id').val(response.data.user_id);
            $('#nama').val(response.data.nama);
            $('#departemen').val(response.data.departemen);
            $('#jabatan').val(response.data.jabatan);
            $('#keperluan_email').val(response.data.keperluan_email);
            $('#keperluan_browsing').val(response.data.keperluan_browsing);
            //open modal
            $('#edit-aksesinternet-modal').modal('show');
        }
    });
});
$('#btn-edit-aksesinternet').click(function(e){
    e.preventDefault();
    let internet_id =$('#id').val();
    let user_id =$('#user_id').val();
    let nama = $('#nama').val();
    let departemen = $('#departemen').val();
    let jabatan = $('#jabatan').val();
    let keperluan_email = $('#keperluan_email').val();
    let keperluan_browsing = $('#keperluan_browsing').val();
    let token   = $("meta[name='csrf-token']").attr("content");

    setTimeout(() => {
        window.location=window.location;
    }, 2200);
    
    $.ajax({
        url: `/aksesinternet/${internet_id}`,
        type: "PUT",
        cache: false,   
        data: { 
            'user_id':user_id,
            'nama':nama,
            'departemen':departemen,
            'jabatan':jabatan,
            'keperluan_email':keperluan_email,
            'keperluan_browsing':keperluan_browsing,
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
                <tr id="index_${response.data.id}">
                    <td class="text-bold-500"><?php echo $no++ ?></td>
                    <td>{{$ai->nama}}</td>
                    <td>{{$ai->departemen}}</td>
                    <td>{{$ai->jabatan}}</td>
                    <td>{{$ai->keperluan_email}}</td>
                    <td>{{$ai->keperluan_browsing}}</td>
                    <td><span class="badge bg-success">{{$ai->detailStatus->nama_status}}</span></td>
                    <td>
                        <a href="javascript:void(0)" id="btn-edit" data-id="${response.data.id}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="javascript:void(0)" id="btn-delete" data-id="${response.data.id}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            `;
            
            //append to post data
            $(`#index_${response.data.id}`).replaceWith(post);

            //close modal
            $('#edit-aksesinternet-modal').modal('hide');
            

        }
    });
});


$('body').on('click', '#btn-accept-internet', function () {
    let internet_id = $(this).data('id');
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

                    url: `/aksesinternet/${internet_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": internet_id,
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

                        //remove post on table
                        // $(`#index_${revisidata_id}`).remove();
                    }
                });

                
            }
        })
        
});

$('body').on('click', '#btn-decline-internet', function () {
    let internet_id = $(this).data('id');
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
                    url: `/aksesinternet/${internet_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": internet_id,
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

$('body').on('click', '#btn-cancel-internet', function () {
    let internet_id = $(this).data('id');
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
                    url: `/aksesinternet/${internet_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": internet_id,
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

$('body').on('click', '#btn-end-internet', function () {
    let internet_id = $(this).data('id');
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
                    url: `/aksesinternet/${internet_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": internet_id,
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