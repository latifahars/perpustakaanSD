@extends('partial.auth')

@section('title','Penerbit Buku')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <form method="post" action="">
                        <a href="{{ url('data_buku') }}"><i class="fas fa-chevron-circle-left mt-2 mr-3"></i></a></i>Daftar Penerbit Buku
                        @csrf
                        <table style="float: right;">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" style="width: 250px" name="nama" placeholder="Nama Penerbit" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" style="width: 220px" name="kota" placeholder="Kota Terbit" required>
                                </td>
                                <td>
                                    <button class="btn btn-penerbit pb-1 pt-1" type="submit"><i class="fas fa-plus"></i> Tambah</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                            <div id="error">{{ $errors->first('nama') }}</div>
                            <div id="error">{{ $errors->first('kota') }}</div>
                            <thead>
                                <tr>
                                    <th width="10%">Kode</th>
                                    <th width="40%">Nama Penerbit</th>
                                    <th width="28%">Kota Terbit</th>
                                    <th width="9%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penerbit as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->kota }}</td>
                                        <td> 
                                            <a style="cursor:pointer;" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $p->id }}"
                                            data-nama="{{ $p->nama }}"
                                            data-kota="{{ $p->kota }}">
                                            <i class="fas fa-edit ml-3 mr-2"></i>
                                            </a>
                                            <a href="{{ url('data_buku/hapus_penerbit/' . $p->id) }}" data-toggle="tooltip"  id="hpspenerbit"><i class="fas fa-trash-alt"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">EDIT PENERBIT</h5>
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
                            <label class="mb-1" for="nama">Nama Penerbit</label>
                                <input class="form-control py-3" id="nama" name="nama" type="text" value="" />
                                <div id="error">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="kota">Kota Terbit</label>
                            <input class="form-control py-3" id="kota" name="kota" type="text" value="" />
                            <div id="error">{{ $errors->first('kota') }}</div>
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
            let kota = $(this).data('kota');
            let id = $(this).data('id');
            $('#kota').val(kota);
            $('#nama').val(nama);
            $('#edit_form').attr('action', '/data_buku/edit_penerbit/' + id);
      })
      $(document).on('click', '#hpspenerbit', function(e){
              e.preventDefault();
              var link = $(this).attr('href');
              
              Swal.fire({
                  title: 'Yakin Dihapus?',
                  text: "Jika penerbit dihapus, maka buku dengan penerbit ini ikut terhapus!",
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