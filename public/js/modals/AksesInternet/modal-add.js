$('body').on('click', '#btn-add-aksesinternet', function(){
    $('#add-aksesinternet-modal').modal('show');
});

$('#store-aksesinternet').click(function(e){
  
    e.preventDefault();
    let user_id =$('#add-user_id').val();
    let nama = $('#add-nama').val();
    let departemen = $('#add-departemen').val();
    let jabatan = $('#add-jabatan').val();
    let keperluan_email = $('#add-keperluan_email').val();
    let keperluan_browsing = $('#add-keperluan_browsing').val();
    let token = $("meta[name='csrf-token']").attr("content");

    $.ajax({

        url: `/aksesinternet`,
        type: "POST",
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
            setTimeout(() => {
                window.location=window.location;
            }, 1200);       
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
                <tr id="index__{{$ai->id}}">
                <td class="text-bold-500"><?php echo $no++ ?></td>
                <td>{{$ai->nama}}</td>
                <td>{{$ai->departemen}}</td>
                <td>{{$ai->jabatan}}</td>
                <td>{{$ai->keperluan_email}}</td>
                <td>{{$ai->keperluan_browsing}}</td>
                <td><span class="badge bg-success">{{$ai->status}}</span></td>
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
            $('#add-jabatan').val();
            $('#add-keperluan_email').val();
            $('#add-keperluan_browsing').val();
            $('#add-keperluan_email').val();

            //close modal
            $('#add-aksesinternet-modal').modal('hide');
            

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

$('body').on('click', '#store-aksesinternet'), function(){
    setTimeout(() => {
        window.location=window.location;
    }, 1200);
}
