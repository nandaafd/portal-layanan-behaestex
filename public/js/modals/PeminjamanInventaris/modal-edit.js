$('body').on('click', '#btn-update-inventaris', function () {
    let inventaris = $(this).data('id');
    console.log(inventaris);
    //fetch detail post with ajax
    $.ajax({
        url: `/inventaris/${inventaris}`,
        type: "GET",
        cache: false,
        success:function(response){
            let idField = response.data[1].length;
            console.log(response)
            $('#user_id').val(response.data[0].user_id);
            $('#departemen').val(response.data[0].departemen);
            $('#nama').val(response.data[0].nama);
            $('#tanggal_dipinjam').val(response.data[0].tanggal_pinjam);
            for(let i = 0; i < idField; i++){
                $('#item'+i).val(response.data[1][i++].master_inventaris_id);
            }
            $(document).ready(function () {
                let x = 0;
                let idField = response.data[1].length;
                let data = response.data[1];
                let pop = idField.pop();
                var wrapper = $("#dropdown-area"); 
                for(let i = 0; i <= idField; i++){
                        $(wrapper).append($('#dropdown-item').html());
                        $('#item').attr('id','item'+ x)
                        $('#item'+ x).attr('id','item'+ x++)
                }
                
		        
                }); 
                

            //open modal    
            $('#edit-inventaris-modal').modal('show');
        }
    });
});
