@extends('partial.auth')

@section('title','Asal Perolehan Buku')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <form method="post" action="">
                        <a href="{{ url('data_buku') }}"><i class="fas fa-chevron-circle-left mt-2 mr-3"></i></a></i>Daftar Asal Perolehan Buku
                        @csrf
                        <table style="float: right;">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" style="width: 250px" name="nama" placeholder="Asal Perolehan" required>
                                </td>
                                <td>
                                    <button class="btn btn-asal pb-1 pt-1" type="submit"><i class="fas fa-plus"></i> Tambah</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                            <div id="error">{{ $errors->first('nama') }}</div>
                            <thead>
                                <tr>
                                    <th width="7%">Kode</th>
                                    <th width="40%">Asal Perolehan Buku</th>
                                    <th width="4%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sumber as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td> 
                                            <a style="cursor:pointer;" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $s->id }}"
                                            data-nama="{{ $s->nama }}">
                                            <i class="fas fa-edit ml-3 mr-2"></i>
                                            </a>
                                            <a href="{{ url('data_buku/hapus_asal/' . $s->id) }}" data-toggle="tooltip"  id="hpssumber"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="edit-modal">
        <div id="modal-edit" class="modal-dialog modal-dialog-centered" role="document">
        <div id="modal-content" class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT ASAL BUKU</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="wrapper" style="margin: 0">
                    <div class="form">
                        <form id="edit_form" action="" method="POST">
                            @csrf                          
                        <div class="form-group">
                            <label class="mb-1" for="nama">Asal Perolehan</label>
                                <input class="form-control py-3" id="nama" name="nama" type="text" value="" />
                                <div id="error">{{ $errors->first('nama') }}</div>
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script>
      $(document).on('click','#edit_item',function(){
            let nama = $(this).data('nama');
            let id = $(this).data('id');
            $('#nama').val(nama);
            $('#edit_form').attr('action', '/data_buku/edit_asal/' + id);
      })
      $(document).on('click', '#hpssumber', function(e){
              e.preventDefault();
              var link = $(this).attr('href');
              
              Swal.fire({
                  title: 'Yakin Dihapus?',
                  text: "Jika asal dihapus, maka buku dengan asal ini ikut terhapus!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#grey',
                  cancelButtonText: 'Batal',
                  confirmButtonText: 'Hapus',
                  reverseButtons: true
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location = link;
                  }
              })
          })
    </script>
@endsection