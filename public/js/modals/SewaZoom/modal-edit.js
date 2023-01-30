$('body').on('click','#btn-edit', function () {
    let sewazoom_id = $(this).data('id');
    $.ajax({
        url: `/sewazoom/${sewazoom_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#id').val(response.data.id);
            $('#user_id').val(response.data.user_id);
            $('#nama').val(response.data.nama);
            $('#departemen').val(response.data.departemen);
            $('#topik').val(response.data.topik);
            $('#tanggal').val(response.data.tanggal);
            $('#jam_mulai').val(response.data.jam_mulai);
            $('#jam_selesai').val(response.data.jam_selesai);
            $('#status').val(response.data.status);

            //open modal
            $('#edit-sewazoom-modal').modal('show');
        }
    });
    
});



$('#btn-edit-sewazoom').click(function(e) {
    e.preventDefault();
    // let sewazoom_id = $(this).data('id');
    // console.log(sewazoom_id)
    //define variable
    let id = $('#id').val();
    let user_id = $('#user_id').val();
    let nama = $('#nama').val();
    let departemen = $('#departemen').val();
    let topik = $('#topik').val();
    let tanggal = $('#tanggal').val();
    let jam_mulai = $('#jam_mulai').val();
    let jam_selesai = $('#jam_selesai').val();
    let status = $('#status').val();
    let token   = $("meta[name='csrf-token']").attr("content");
    console.log(id)
    //ajax
    $.ajax({

        url: `/sewazoom/${id}`,
        type: "PUT",
        cache: false,   
        data: { 
            'id':id,
            'user_id':user_id,
            'nama':nama,
            'departemen':departemen,
            'topik':topik,
            'tanggal':tanggal,
            'jam_mulai':jam_mulai,
            'jam_selesai':jam_selesai,
            'status':status,
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
                // <?php $no = 1; ?>
                <tr id="index_${response.data.id}">
                // <td class="text-bold-500"> <?php echo $no++ ?></td>
                <td>${response.data.nama}</td>
                <td>${response.data.departemen}</td>
                <td>${response.data.jam_mulai}</td>
                <td>${response.data.jam_selesai}</td>
                <td><span class="badge bg-success">${response.data.status}</span></td>
                <td>
                    <a href="javascript:void(0)" id="btn-edit" data-id="${response.data.id}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="javascript:void(0)" id="btn-delete" data-id="${response.data.id}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </td>
                </tr>
            `;
            
            //append to post data
            $(`#index_${response.data.id}`).replaceWith(post);

            //close modal
            $('#edit-sewazoom-modal').modal('hide');
            

        },
        error:function(error){
            
            if(error.responseJSON.nama[0]) {

                //show alert
                $('#alert-nama-edit').removeClass('d-none');
                $('#alert-nama-edit').addClass('d-block');

                //add message to alert
                $('#alert-nama-edit').html(error.responseJSON.nama[0]);
            }
            if(error.responseJSON.departemen[0]) {

                //show alert
                $('#alert-departemen-edit').removeClass('d-none');
                $('#alert-departemen-edit').addClass('d-block');

                //add message to alert
                $('#alert-departemen-edit').html(error.responseJSON.departemen[0]);
            } 

            
            if(error.responseJSON.topik[0]) {

                //show alert
                $('#alert-topik-edit').removeClass('d-none');
                $('#alert-topik-edit').addClass('d-block');

                //add message to alert
                $('#alert-topik-edit').html(error.responseJSON.topik[0]);
            } 
            if(error.responseJSON.tanggal[0]) {

                //show alert
                $('#alert-tanggal-edit').removeClass('d-none');
                $('#alert-tanggal-edit').addClass('d-block');

                //add message to alert
                $('#alert-tanggal-edit').html(error.responseJSON.tanggal[0]);
            } 
            if(error.responseJSON.jam_mulai[0]) {

                //show alert
                $('#alert-jam_mulai-edit').removeClass('d-none');
                $('#alert-jam_mulai-edit').addClass('d-block');

                //add message to alert
                $('#alert-jam_mulai-edit').html(error.responseJSON.jam_mulai[0]);
            } 
            if(error.responseJSON.jam_selesai[0]) {

                //show alert
                $('#alert-jam_selesai-edit').removeClass('d-none');
                $('#alert-jam_selesai-edit').addClass('d-block');

                //add message to alert
                $('#alert-jam_mulai-edit').html(error.responseJSON.jam_selesai[0]);
            } 

        }
        

    });

});

$('body').on('click', '#btn-approve', function () {
    let sewa_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "ingin menyetujui pengajuan ini?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, SETUJU!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/sewazoom/${sewa_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": sewa_id,
                        "type": "approve"
                    },
                    success:function(response){ 
                        setTimeout(function(){
                            window.location=window.location;
                        },1220);
                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        // $(`#index_${sewa_id}`).remove();
                    }
                });

                
            }
        })
        
});

$('body').on('click', '#btn-decline', function () {
    let sewa_id = $(this).data('id');
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

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/sewazoom/${sewa_id}/update`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": sewa_id,
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
                        // $(`#index_${sewa_id}`).remove();
                    }
                });

                
            }
        })
        
});
