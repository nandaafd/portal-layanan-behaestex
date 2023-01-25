$('body').on('click','#btn-add-sewazoom', function () {
    $('#add-sewazoom-modal').modal('show');
});

$('#store').click(function(e) {
    e.preventDefault();

    //define variable
    let nama = $('#add-nama').val();
    let departemen = $('#add-departemen').val();
    let topik = $('#add-topik').val();
    let tanggal = $('#add-tanggal').val();
    let jam_mulai = $('#add-jam_mulai').val();
    let jam_selesai = $('#add-jam_selesai').val();
    // let status = $('#status').val();
    let token   = $("meta[name='csrf-token']").attr("content");
    
    //ajax
    $.ajax({

        url: `/sewazoom`,
        type: "POST",
        cache: false,
        data: {
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
            
            //append to table
            $('#table-sewazoom').prepend(post);
            
            //clear form
            $('#add-nama').val();
            $('#add-departemen').val();
            $('#add-topik').val();
            $('#add-tanggal').val();
            $('#add-jam_mulai').val();
            $('#add-jam_selesai').val();

            //close modal
            $('#add-sewazoom-modal').modal('hide');
            

        },
        // error:function(error){
            
        //     if(error.responseJSON.nama[0]) {

        //         //show alert
        //         $('#alert-nama-edit').removeClass('d-none');
        //         $('#alert-nama-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-nama-edit').html(error.responseJSON.nama[0]);
        //     }
        //     if(error.responseJSON.departemen[0]) {

        //         //show alert
        //         $('#alert-departemen-edit').removeClass('d-none');
        //         $('#alert-departemen-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-departemen-edit').html(error.responseJSON.departemen[0]);
        //     } 

            
        //     if(error.responseJSON.topik[0]) {

        //         //show alert
        //         $('#alert-topik-edit').removeClass('d-none');
        //         $('#alert-topik-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-topik-edit').html(error.responseJSON.topik[0]);
        //     } 
        //     if(error.responseJSON.tanggal[0]) {

        //         //show alert
        //         $('#alert-tanggal-edit').removeClass('d-none');
        //         $('#alert-tanggal-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-tanggal-edit').html(error.responseJSON.tanggal[0]);
        //     } 
        //     if(error.responseJSON.jam_mulai[0]) {

        //         //show alert
        //         $('#alert-jam_mulai-edit').removeClass('d-none');
        //         $('#alert-jam_mulai-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-jam_mulai-edit').html(error.responseJSON.jam_mulai[0]);
        //     } 
        //     if(error.responseJSON.jam_selesai[0]) {

        //         //show alert
        //         $('#alert-jam_selesai-edit').removeClass('d-none');
        //         $('#alert-jam_selesai-edit').addClass('d-block');

        //         //add message to alert
        //         $('#alert-jam_mulai-edit').html(error.responseJSON.jam_selesai[0]);
        //     } 

        // }
        

    });

});
