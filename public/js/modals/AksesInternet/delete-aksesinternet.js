$('body').on('click', '#btn-delete-aksesinternet', function () {

    let internet_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    console.log(internet_id)
    Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'TIDAK',
        confirmButtonText: 'YA, HAPUS!'
    }).then((result) => {
        if (result.isConfirmed) {
            setTimeout(() => {
                window.location=window.location;
            }, 2200);
            //fetch to delete data
            $.ajax({

                url: `/aksesinternet/${internet_id}`,
                type: "DELETE",
                cache: false,
                data: {
                    "_token": token
                },
                success:function(response){ 

                    //show success message
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    //remove post on table
                    $(`#index_${internet_id}`).remove();
                }
            });

            
        }
    })
    
});


