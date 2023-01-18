$('body').on('click','#btn-add-revisidata', function () {
    $('#add-revisidata-modal').modal('show');
});





$('body').on('click', '#btn-edit', function () {
   
    let id = $(this).data('id');

    //fetch detail post with ajax
    $.ajax({
        url: `/revisidata/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#id').val(response.data.id);
            $('#user_id').val(response.data.user_id);
            $('#jenis_revisi').val(response.data.jenis_revisi);
            $('#tanggal').val(response.data.tanggal);
            $('#tanggal_data').val(response.data.tanggal_data);
            $('#jenis_data').val(response.data.jenis_data);
            $('#nama_data').val(response.data.nama_data);
            $('#detail_revisi').val(response.data.detail_revisi);
            $('#alasan_revisi').val(response.data.alasan_revisi);
            $('#status').val(response.data.status);

            //open modal
            $('#edit-revisidata-modal').modal('show');
        }
    });
});




// $('#btn-edit-revisidata').click(function(e) {
//     e.preventDefault();

//     //define variable
//     let id = $('#id').val();
//     let user_id = $('#user_id').val();
//     let jenis_revisi = $('#jenis_revisi').val();
//     let tanggal = $('#tanggal').val();
//     let tanggal_data = $('#tanggal_data').val();
//     let jenis_data = $('#jenis_data').val();
//     let nama_data = $('#nama_data').val();
//     let detail_revisi = $('#detail_revisi').val();
//     let alasan_revisi = $('#alasan_revisi').val();
//     let status = $('#status').val();
//     let token   = $("meta[name='csrf-token']").attr("content");
    
//     //ajax
//     $.ajax({

//         url: `/posts/${post_id}`,
//         type: "PUT",
//         cache: false,   
//         data: {
//             'id':id,
//             'user_id':user_id,
//             'jenis_revisi':jenis_revisi,
//             'tanggal':tanggal,
//             'tanggal_data':tanggal_data,
//             'jenis_data':jenis_data,
//             'nama_data':nama_data,
//             'detail_revisi':detail_revisi,
//             'alasan_revisi':alasan_revisi,
//             'status':status,
//             "_token": token
//         },
//         success:function(response){

//             //show success message
//             Swal.fire({
//                 type: 'success',
//                 icon: 'success',
//                 nama: `${response.message}`,
//                 showConfirmButton: false,
//                 timer: 3000
//             });

//             //data post
//             let post = `
//                 <tr id="index_${response.data.id}">
//                     <td>${response.data.nama}</td>
//                     <td>${response.data.nim}</td>
//                     <td class="text-center">
//                         <a href="javascript:void(0)" id="btn-edit-revisidata" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
//                         <a href="javascript:void(0)" id="btn-delete-revisidata" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
//                     </td>
//                 </tr>
//             `;
            
//             //append to post data
//             $(`#index_${response.data.id}`).replaceWith(post);

//             //close modal
//             $('#edit-revisidata-modal').modal('hide');
            

//         },
//         error:function(error){
            
//             if(error.responseJSON.nama[0]) {

//                 //show alert
//                 $('#alert-nama-edit').removeClass('d-none');
//                 $('#alert-nama-edit').addClass('d-block');

//                 //add message to alert
//                 $('#alert-nama-edit').html(error.responseJSON.nama[0]);
//             } 

//             if(error.responseJSON.nim[0]) {

//                 //show alert
//                 $('#alert-nim-edit').removeClass('d-none');
//                 $('#alert-nim-edit').addClass('d-block');

//                 //add message to alert
//                 $('#alert-nim-edit').html(error.responseJSON.nim[0]);
//             } 

//         }

//     });

// });



// $('#store').click(function(e) {
//     let jenis_revisi = $('#jenis_revisi').val();
//     let tanggal = $('#tanggal').val();
//     let tanggal_data = $('#tanggal_data').val();
//     let jenis_data = $('#jenis_data').val();
//     let nama_data = $('#nama_data').val();
//     let detail_revisi = $('#detail_revisi').val();
//     let alasan_revisi = $('#alasan_revisi').val();
//     let token   = $("meta[name='csrf-token']").attr("content");

//     $.ajax({
//         url: '/revisidata',
//         type: 'POST',
//         cache:false,
//         data:{
//             'jenis_revisi':jenis_revisi,
//             'tanggal':tanggal,
//             'tanggal_data':tanggal_data,
//             'jenis_data':jenis_data,
//             'nama_data':nama_data,
//             'detail_revisi':detail_revisi,
//             'alasan_revisi':alasan_revisi,
//             "_token": token

//         },
//         success: function(response) {
//             Swal.fire({
//                 type: 'success',
//                 icon: 'success',
//                 title: `${response.message}`,
//                 showConfirmButton: false,
//                 timer: 3000
//             });
//             let post = `
//                     <tr id="index_${response.data.id}">
//                         <td>${response.data.jenis_revisi}</td>
//                         <td>${response.data.tanggal}</td>
//                         <td>${response.data.tanggal_data}</td>
//                         <td>${response.data.jenis_data}</td>
//                         <td>${response.data.nama_data}</td>
//                         <td>${response.data.detail_revisi}</td>
//                         <td>${response.data.alasan_revisi}</td>
//                         <td class="text-center">
//                             <a href="javascript:void(0)" id="btn-edit-revisidata" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
//                             <a href="javascript:void(0)" id="btn-delete-revisidata" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
//                         </td>
//                     </tr>
//                 `;
                
//                 //append to table
//                 $('#table-revisidata').prepend(post);
                
//                 //clear form
//                 $('#jenis_revisi').val('');
//                 $('#tanggal').val('');
//                 $('#tanggal_data').val('');
//                 $('#jenis_data').val('');
//                 $('#nama_data').val('');
//                 $('#detail_revisi').val('');
//                 $('#alasan_revisi').val('');
                

//                 //close modal
//                 $('#add-revisidata-modal').modal('hide');
//         },
//         error: function(error){
           
//         }
//     })
// })
