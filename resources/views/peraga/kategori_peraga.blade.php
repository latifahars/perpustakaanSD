@extends('partial.auth')

@section('title','Data Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <form method="post" action="">
                         <a href="{{ url('data_peraga') }}"><i class="fas fa-chevron-circle-left mt-2 mr-3"></i></a>
                         Daftar Kategori
                        @csrf
                        <table style="float: right;">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" style="width: 200px" name="nama" placeholder="Nama Kategori" required>
                                </td>
                                <td>
                                    <button class="btn btn-tambahbuku pb-1 pt-1" type="submit"><i class="fas fa-plus"></i> Tambah</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <div id="error">{{ $errors->first('nama') }}</div>
                            <thead>
                                <tr>
                                	<th width="7%">No</th>
                                    <th width="40%">Nama Kategori</th>
                                    <th width="30%">Jumlah Alat Peraga</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{ $k->peraga_count }}</td>
                                    <td>
                                        <a style="cursor:pointer" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $k->id }}"
                                            data-nama="{{ $k->nama }}">
                                            <i class="fas fa-edit ml-3 mr-2"></i></a>

                                        <a href="{{ url('data_peraga/hapus_kategori/' . $k->id) }}" data-toggle="tooltip" id="pesan"><i class="fas fa-trash-alt"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">EDIT KATEGORI</h5>
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
                            <label class="mb-1" for="nama">Nama Kategori</label>
                            <input class="form-control py-3" id="nama" name="nama" type="text" value=""/>
                            <div id="error">{{ $errors->first('nama') }}</div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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

                $('#edit_form').attr('action', '/data_peraga/edit_kategori/' + id);
          })
      </script>

@endsection