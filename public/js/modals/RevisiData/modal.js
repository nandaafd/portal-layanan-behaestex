// $('body').on('click','#btn-add-revisidata', function () {
//     $('#add-revisidata-modal').modal('show');
// });




// $('body').on('click', '#btn-edit', function () {
   
//     let revisidata_id = $(this).data('id');

//     //fetch detail post with ajax
//     $.ajax({
//         url: `/revisidata/${revisidata_id}`,
//         type: "GET",
//         cache: false,
//         success:function(response){
//             console.log(response)
//             //fill data to form
//             $('#id').val(response.data.id);
//             $('#user_id').val(response.data.user_id);
//             $('#jenis_revisi').val(response.data.jenis_revisi);
//             $('#tanggal').val(response.data.tanggal);
//             $('#tanggal_data').val(response.data.tanggal_data);
//             $('#jenis_data').val(response.data.jenis_data);
//             $('#nama_data').val(response.data.nama_data);
//             $('#detail_revisi').val(response.data.detail_revisi);
//             $('#alasan_revisi').val(response.data.alasan_revisi);
//             $('#status').val(response.data.status);

//             //open modal
//             $('#edit-revisidata-modal').modal('show');
//         }
//     });
// });




// $('#btn-edit-revisidata').click(function(e) {
//     e.preventDefault();
//     let revisidata_id = $(this).data('id');
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

//         url: `/revisidata/${revisidata_id}`,
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
//                 title: `${response.message}`,
//                 showConfirmButton: false,
//                 timer: 3000
//             });

//             //data post
//             let post = `
//                 <tr id="index_{{ $rev->id }}">
//                                     <td class="text-bold-500"><?php echo $no++ ?></td>
//                                     <td>{{$rev->jenis_revisi}}</td>
//                                     <td>{{$rev->tanggal}}</td>
//                                     <td>{{$rev->tanggal_data}}</td>
//                                     <td>{{$rev->jenis_data}}</td>
//                                     <td>{{$rev->nama_data}}</td>
//                                     <td><span class="badge bg-success">{{$rev->status}}</span></td>
//                                     <td>
//                                         <a href="javascript:void(0)" id="btn-view" data-id="{{$rev->id}}" class="btn btn-warning btn-sm"
//                                             title="detail"><i class="bi bi-eye-fill"></i></a>
//                                     </td>
//                                     <td>
//                                         <a href="javascript:void(0)" id="btn-edit" data-id="{{$rev->id}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
//                                         <a href="javascript:void(0)" id="btn-delete" data-id="{{$rev->id}}" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
//                                             <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
//                                           </svg></i></a>
//                                     </td>
//                                 </tr>
//             `;
            
//             //append to post data
//             $(`#index_${response.data.id}`).replaceWith(post);

//             //close modal
//             $('#edit-revisidata-modal').modal('hide');
            

//         },
//         // error:function(error){
            
//         //     if(error.responseJSON.nama[0]) {

//         //         //show alert
//         //         $('#alert-nama-edit').removeClass('d-none');
//         //         $('#alert-nama-edit').addClass('d-block');

//         //         //add message to alert
//         //         $('#alert-nama-edit').html(error.responseJSON.nama[0]);
//         //     } 

//         //     if(error.responseJSON.nim[0]) {

//         //         //show alert
//         //         $('#alert-nim-edit').removeClass('d-none');
//         //         $('#alert-nim-edit').addClass('d-block');

//         //         //add message to alert
//         //         $('#alert-nim-edit').html(error.responseJSON.nim[0]);
//         //     } 

//         // }

//     });

// });



// // $('#store').click(function(e) {
// //     let jenis_revisi = $('#jenis_revisi').val();
// //     let tanggal = $('#tanggal').val();
// //     let tanggal_data = $('#tanggal_data').val();
// //     let jenis_data = $('#jenis_data').val();
// //     let nama_data = $('#nama_data').val();
// //     let detail_revisi = $('#detail_revisi').val();
// //     let alasan_revisi = $('#alasan_revisi').val();
// //     let token   = $("meta[name='csrf-token']").attr("content");

// //     $.ajax({
// //         url: '/revisidata',
// //         type: 'POST',
// //         cache:false,
// //         data:{
// //             'jenis_revisi':jenis_revisi,
// //             'tanggal':tanggal,
// //             'tanggal_data':tanggal_data,
// //             'jenis_data':jenis_data,
// //             'nama_data':nama_data,
// //             'detail_revisi':detail_revisi,
// //             'alasan_revisi':alasan_revisi,
// //             "_token": token

// //         },
// //         success: function(response) {
// //             Swal.fire({
// //                 type: 'success',
// //                 icon: 'success',
// //                 title: `${response.message}`,
// //                 showConfirmButton: false,
// //                 timer: 3000
// //             });
// //             let post = `
// //                     <tr id="index_${response.data.id}">
// //                         <td>${response.data.jenis_revisi}</td>
// //                         <td>${response.data.tanggal}</td>
// //                         <td>${response.data.tanggal_data}</td>
// //                         <td>${response.data.jenis_data}</td>
// //                         <td>${response.data.nama_data}</td>
// //                         <td>${response.data.detail_revisi}</td>
// //                         <td>${response.data.alasan_revisi}</td>
// //                         <td class="text-center">
// //                             <a href="javascript:void(0)" id="btn-edit-revisidata" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
// //                             <a href="javascript:void(0)" id="btn-delete-revisidata" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
// //                         </td>
// //                     </tr>
// //                 `;
                
// //                 //append to table
// //                 $('#table-revisidata').prepend(post);
                
// //                 //clear form
// //                 $('#jenis_revisi').val('');
// //                 $('#tanggal').val('');
// //                 $('#tanggal_data').val('');
// //                 $('#jenis_data').val('');
// //                 $('#nama_data').val('');
// //                 $('#detail_revisi').val('');
// //                 $('#alasan_revisi').val('');
                

// //                 //close modal
// //                 $('#add-revisidata-modal').modal('hide');
// //         },
// //         error: function(error){
           
// //         }
// //     })
// // })
