$('body').on('click','#btn-view-item',function () {
    let id = $(this).data('id');
    //fetch detail post with ajax
    $.ajax({
        url: `/inventaris/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
            console.log(response)
            //fill data to form
            $('#item-inv').val(response.data[0].iteminv);
            

            //open modal
            $('#view-item-inventaris').modal('show');
        }
    });
})