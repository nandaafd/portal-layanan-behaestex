$('body').on('click', '#btn-kembalikan', function () {
    let inventaris_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'Apakah Kamu Yakin ingin mengembalikan inventaris ini?',
            text: "Pastikan anda mengembalikan dengan tepat waktu dan tidak ada kerusakan apapun.",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, KEMBALIKAN'
        }).then((result) => {
            if (result.isConfirmed) {
                //fetch to delete data
                $.ajax({
                    url: `/inventaris/${inventaris_id}/pengembalian`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token,
                        "id": inventaris_id,
                        "type": "dikembalikan"
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
                        setTimeout(() => {
                            window.location=window.location;
                        }, 1200);
                    }
                });
            }
        })   
});