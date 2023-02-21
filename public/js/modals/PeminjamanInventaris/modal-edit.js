$('body').on('click', '#btn-update-inventaris', function () {
    let inventaris = $(this).data('id');
    console.log(inventaris);
    //fetch detail post with ajax
    $.ajax({
        url: `/inventaris/${inventaris}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#user_id').val(response.data[0].user_id);
            $('#departemen').val(response.data[0].departemen);
            $('#nama').val(response.data[0].nama);
            $('#tanggal_dipinjam').val(response.data[0].tanggal_pinjam);
            $('#item').val(response.data[1].master_inventaris_id);

            //open modal    
            $('#edit-inventaris-modal').modal('show');
        }
    });
});
