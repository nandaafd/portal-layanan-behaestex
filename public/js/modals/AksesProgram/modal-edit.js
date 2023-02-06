$('body').on('click', '#btn-update-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    //fetch detail post with ajax
    $.ajax({
        url: `/aksesprogram/${aksesprogram_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#id').val(response.data.id);
            $('#user_id').val(response.data.user_id);
            $('#departemen').val(response.data.departemen);
            $('#nama_program').val(response.data.nama_program);
            $('#latar_belakang').val(response.data.latar_belakang);
            $('#proses_bisnis').val(response.data.proses_bisnis);
            $('#sop').val(response.data.sop);
            $('#benefit').val(response.data.benefit);
            $('#konsekuensi').val(response.data.konsekuensi);
            $('#sop').val(response.data.fitur);
            $('#sop').val(response.data.prosedur_dan_dokumen);
            $('#status').val(response.data.status);

            //open modal
            $('#edit-aksesprogram-modal').modal('show');
        }
    });
});