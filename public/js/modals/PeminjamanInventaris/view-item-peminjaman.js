
$('body').one('click','#btn-view-item',function () {
    let id = $(this).data('id');
    console.log(id);
    //fetch detail post with ajax
    $.ajax({
        url: `/inventaris/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#namaa').val(response.data[0].nama);
            let idField = response.data[1].length;
            let x = 0;
            let a  = 0;
            var wrapper = $("#view-area");
            let i = 0;
            do {
                $(wrapper).append($('#view-item').html());
                        $('#iteminv').attr('id','iteminv'+ i)
                i++;
            } while (i < idField);

            do {

                $('#iteminv'+a).val(response.data[1][a++].master_inventaris.nama_barang);
                x++;
            } while (x < idField);

            //open modal
            $('#view-item-inventaris').modal('show');
        }
    });
});