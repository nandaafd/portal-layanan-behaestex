$('body').on('click', '#btn-add-inventaris', function() {
    $('#add-inventaris-modal').modal('show')
});

$('#store-inventaris').click(function(e) {
    let user_id =$('#add-user_id').val();
    let nama = $('#add-nama').val();
    let departemen = $('#add-departemen').val();
    let tanggal_pinjam = $('#tanggal_pinjam').val();
    let tanggal_dikembalikan = $('#tanggal_dikembalikan').val();
    let item_inventaris = $('.pilihan').val();
    let token = $("meta[name='csrf-token']").attr("content");
    arr = [];
    $('.pilihan').each(function(){
        arr.push($(this).val())
    })
    let resItem = arr.pop();
    console.log(arr);

    $.ajax({
        url: `/inventaris`,
        type: "POST",
        cache: false,
        data: {
            'user_id':user_id,
            'nama':nama,
            'departemen':departemen,
            'tanggal_pinjam':tanggal_pinjam,
            'tanggal_dikembalikan':tanggal_dikembalikan,
            'item[]':arr,
            "_token": token
        }, 
        success:function(response) {
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
         

     }
        
        
    })
})

