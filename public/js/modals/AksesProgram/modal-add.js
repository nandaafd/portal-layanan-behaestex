$('body').on('click', '#btn-add-aksesprogram', function(){
    $('#add-aksesprogram-modal').modal('show');
});


$('#store-aksesprogram').click(function(e){

    
    e.preventDefault();
    let user_id =$('#add-user_id').val();
    let departemen = $('#add-departemen').val();
    let nama_program = $('#add-nama_program').val();
    let latar_belakang = $('#add-latar_belakang').val();
    let proses_bisnis = $('#add-proses_bisnis').val();
    let sop = $('#add-sop').val();
    let benefit = $('#add-benefit').val();
    let konsekuensi = $('#add-konsekuensi').val();
    let fitur = $('#add-fitur').val();
    let prosedur_dan_dokumen = $('#add-prosedur_dan_dokumen').val();
    let token = $("meta[name='csrf-token']").attr("content");

    $.ajax({

        url: `/aksesprogram`,
        type: "POST",
        cache: false,
        data: {
            'user_id':user_id,
            'nama_program':nama_program,
            'departemen':departemen,
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
            <tr id="index__{{$ap->id}}">
            <td>{{$ap->departemen}}</td>
            <td>{{$ap->nama_program}}</td>
            <td><span class="badge bg-success">{{$ap->status}}</span></td>
            <td>
                <button id="btn-accept-aksesprogram" data-id="{{$ap->id}}" class="btn btn-primary btn-sm" title="Approve"><i class="bi bi-check"></i></button>
                <button id="btn-decline-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Decline"><i class="bi bi-x"></i></button> 
                <button id="btn-view-aksesprogram" data-id="{{$ap->id}}" class="btn btn-warning btn-sm" title="lihat detail"><i class="bi bi-eye-fill"></i></button>
                <button id="btn-update-revisidata" data-id="{{$ap->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                <button id="btn-delete-aksesprogram" data-id="{{$ap->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
            </td>
            </tr>
            `;
            
            //append to table
            $('#table-aksesprogram').prepend(post);
            
            //clear form
            $('#add-departemen').val();
            $('#add-nama_program').val();
            $('#add-latar_belakang').val();
            $('#add-proses_bisnis').val();
            $('#add-sop').val();
            $('#add-konsekuensi').val();
            $('#add-benefit').val();
            $('#add-fitur').val();
            $('#add-prosedur_dan_dokumen').val();

            //close modal
            $('#add-aksesprogram-modal').modal('hide');
            

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

// $('body').on('click', '#store-aksesinternet'), function(){
//     setTimeout(() => {
//         window.location=window.location;
//     }, 1200);
// }