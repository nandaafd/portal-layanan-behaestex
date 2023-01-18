
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
            $('#view-revisidata-modal').modal('show');
        }
    });
});