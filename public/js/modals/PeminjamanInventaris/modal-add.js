$('body').on('click', '#btn-add-inventaris', function() {
    $('#add-inventaris-modal').modal('show')
});

$('#store-inventaris').click(function(e) {
    let user_id =$('#add-user_id').val();
    let nama = $('#add-nama').val();
    let departemen = $('#add-departemen').val();
    let tanggal_pinjam = $('#tanggal_pinjam').val();
    let tanggal_dikembalikan = $('#tanggal_dikembalikan').val();
    let item_inventaris = $('.pilihan').val();
    let token = $("meta[name='csrf-token']").attr("content");
    arr = [];
    $('.pilihan').each(function(){
        arr.push($(this).val())
    })
    let resItem = arr.pop();
    console.log(arr);

    $.ajax({
        url: `/inventaris`,
        type: "POST",
        cache: false,
        data: {
            'user_id':user_id,
            'nama':nama,
            'departemen':departemen,
            'tanggal_pinjam':tanggal_pinjam,
            'tanggal_dikembalikan':tanggal_dikembalikan,
            'item[]':arr,
            "_token": token
        }, 
        success:function(response) {
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 3000
            }); 
             //data post
             let post = `
             <tr id="index__{{$data->id}}">
                                    <td class="text-bold-500">{{$data->nama}}</td>
                                    <td>{{$data->departemen}}</td>
                                    <td>
                                        {{-- @forelse ($item_peminjaman as $item)
                                        @if ($item->peminjaman_id == $data->id)
                                            {{$item->master_inventaris_id}}
                                        @endif 
                                        @empty   
                                        @endforelse --}}
                                    </td>
                                    <td>{{$data->tanggal_pinjam}}</td>
                                    <td>{{$data->tanggal_dikembalikan}}</td>
                                    @if ($data->status ==1)
                                        <td><span class="badge bg-warning">{{$data->detailStatus->nama_status}}</span></td>
                                    @elseif($data->status ==2)
                                        <td><span class="badge bg-success">{{$data->detailStatus->nama_status}}</span></td>
                                    @elseif ($data->status ==5)
                                        <td><span class="badge bg-danger">{{$data->detailStatus->nama_status}}</span></td>
                                    @elseif ($data->status ==4)
                                        <td><span class="badge bg-secondary">{{$data->detailStatus->nama_status}}</span></td>
                                    @elseif ($data->status ==6)
                                        <td><span class="badge bg-danger">{{$data->detailStatus->nama_status}}</span></td>
                                    @endif
                                    <td>
                                        @if(Auth::user()->hak_akses_id == 1) 
                                            <button id="btn-status" title="edit status" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">status</button>
                                            <ul class="dropdown-menu" aria-labelledby="btn-status">
                                                @if ($data->status == 1)
                                                    <li><button class="dropdown-item" id="btn-accept-inventaris" data-id="{{$data->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-decline-inventaris" data-id="{{$data->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-inventaris" data-id="{{$data->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($data->status == 2)
                                                    <li><button class="dropdown-item" id="btn-decline-inventaris" data-id="{{$data->id}}"><i class="fas fa-ban pe-2"></i>Decline</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-inventaris" data-id="{{$data->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($data->status == 5)
                                                    <li><button class="dropdown-item" id="btn-accept-inventaris" data-id="{{$data->id}}"><i class="fas fa-check pe-2"></i>Accept</button></li>
                                                    <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>    
                                                    <li><button class="dropdown-item" id="btn-cancel-inventaris" data-id="{{$data->id}}"><i class="fas fa-times-circle pe-2"></i>Cancel</button></li>
                                                @elseif ($data->status == 6)
                                                    <li><button class="dropdown-item" id="btn-end-inventaris" data-id="{{$data->id}}"><i class="fas fa-check-square pe-2"></i>End</button></li>  
                                                @elseif ($data->status == 4)  
                                                    <li style="margin-left:10px;">Status tidak dapat diubah</li>
                                                @endif
                                            </ul>
                                            {{-- <button id="btn-kembalikan" data-id="{{$data->id}}" class="btn btn-warning btn-sm" title="Kembalikan"><i class="bi bi-capslock-fill"></i></button> --}}
                                            <button id="btn-update-inventaris" data-id="{{$data->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                            <button id="btn-delete-inventaris" data-id="{{$data->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>                                        @else
                                            @if(Auth::id() === $data->user_id)
                                                @if ($data->status == 2)  
                                                    <button id="btn-kembalikan" data-id="{{$data->id}}" class="btn btn-secondary btn-sm" title="Kembalikan"><i class="fas fa-arrow-up pe-2"></i>Kembalikan</button>
                                                @endif
                                                <button id="btn-update-inventaris" data-id="{{$data->id}}" class="btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i> </button>
                                            @endif
                                        @endif
                                    </td>                                       
                                </tr>
         `;
         
         //append to table
         $('#table-sewazoom').prepend(post);
         
         //clear form
         $('#add-nama').val();
         $('#add-departemen').val();
         $('#add-jabatan').val();
         $('#add-keperluan_email').val();
         $('#add-keperluan_browsing').val();
         $('#add-keperluan_email').val();

         //close modal
         $('#add-aksesinternet-modal').modal('hide');
         

     }
        
        
    })
})

