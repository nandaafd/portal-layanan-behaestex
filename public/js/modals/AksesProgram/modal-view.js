$('body').on('click', '#btn-view-aksesprogram', function () {
    let aksesprogram_id = $(this).data('id');
    //fetch detail post with ajax
    $.ajax({
        url: `/aksesprogram/${aksesprogram_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#view-id').val(response.data.id);
            $('#view-user_id').val(response.data.user_id);
            $('#view-departemen').val(response.data.departemen);
            $('#view-nama_program').val(response.data.nama_program);
            $('#view-latar_belakang').val(response.data.latar_belakang);
            $('#view-proses_bisnis').val(response.data.proses_bisnis);
            $('#view-sop').val(response.data.sop);
            $('#view-benefit').val(response.data.benefit);
            $('#view-konsekuensi').val(response.data.konsekuensi);
            $('#view-fitur').val(response.data.fitur);
            $('#view-prosedur_dan_dokumen').val(response.data.prosedur_dan_dokumen);

            //open modal
            $('#view-aksesprogram-modal').modal('show');
        }
    });
});