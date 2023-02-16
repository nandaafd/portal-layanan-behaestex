
$('body').on('click', '#btn-view', function () {
//    $('input').attr('readonly', true);
    let id = $(this).data('id');

    //fetch detail post with ajax
    $.ajax({
        url: `/revisidata/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#view-id').val(response.data.id);
            $('#view-user_id').val(response.data.user_id);
            $('#view-jenis_revisi').val(response.data.jenis_revisi);
            $('#view-tanggal').val(response.data.tanggal);
            $('#view-tanggal_data').val(response.data.tanggal_data);
            $('#view-jenis_data').val(response.data.jenis_data);
            $('#view-nama_data').val(response.data.nama_data);
            $('#view-detail_revisi').val(response.data.detail_revisi);
            $('#view-alasan_revisi').val(response.data.alasan_revisi);
            $('#view-status').val(response.data.status);

            //open modal
            $('#view-revisidata-modal').modal('show');
        }
    });
});

