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
    let internet_id = $(this).data('id');
    console.log(internet_id)
    e.preventDefault();
    let id =$('#id').val();
    let user_id =$('#user_id').val();
    let nama = $('#nama').val();
    let departemen = $('#departemen').val();
    let jabatan = $('#jabatan').val();
    let keperluan_email = $('#keperluan_email').val();
    let keperluan_browsing = $('#keperluan_browsing').val();
    let token   = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: `/aksesinternet/${id}`,
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
    })
})