$('body').on('click','#btn-add-revisidata', function () {
    $('#add-revisidata-modal').modal('show');
});

$('#add-revisidata').click(function(e) {
    e.preventDefault();
    let user_id = $('#user_id').val();
    let jenis_revisi = $('#add-jenis_revisi').val();
    let tanggal = $('#add-tanggal').val();
    let tanggal_data = $('#add-tanggal_data').val();
    let jenis_data = $('#add-jenis_data').val();
    let nama_data = $('#add-nama_data').val();
    let detail_revisi = $('#add-detail_revisi').val();
    let alasan_revisi = $('#add-alasan_revisi').val();
    let token   = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: '/revisidata',
        type: 'POST',
        cache:false,
        data:{
            'user_id':user_id,
            'jenis_revisi':jenis_revisi,
            'tanggal':tanggal,
            'tanggal_data':tanggal_data,
            'jenis_data':jenis_data,
            'nama_data':nama_data,
            'detail_revisi':detail_revisi,
            'alasan_revisi':alasan_revisi,
            "_token": token

        },
        success: function(response) {
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 3000
            });
            let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.jenis_revisi}</td>
                        <td>${response.data.tanggal}</td>
                        <td>${response.data.tanggal_data}</td>
                        <td>${response.data.jenis_data}</td>
                        <td>${response.data.nama_data}</td>
                        <td>${response.data.detail_revisi}</td>
                        <td>${response.data.alasan_revisi}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-revisidata" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-revisidata" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-revisidata').prepend(post);
                
                //clear form
                $('#jenis_revisi').val('');
                $('#tanggal').val('');
                $('#tanggal_data').val('');
                $('#jenis_data').val('');
                $('#nama_data').val('');
                $('#detail_revisi').val('');
                $('#alasan_revisi').val('');
                

                //close modal
                $('#add-revisidata-modal').modal('hide');
        },
        error: function(error){
           
        }
    })
})
