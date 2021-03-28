@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <form method="post" action="">
                        <a href="{{ url('data_buku') }}"><i class="fas fa-chevron-circle-left mt-2 mr-3"></i></a></i>Daftar Kategori
                        @csrf
                        <table style="float: right;">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" style="width: 200px" name="nama" placeholder="Nama Kategori" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" style="width: 230px" name="batas_peminjaman" placeholder="Batas Peminjaman (minggu)" required>
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
                        <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                            <div id="error">{{ $errors->first('nama') }}</div>
                            <div id="error">{{ $errors->first('deadline') }}</div>
                            <thead>
                                <tr>
                                    <th width="10%">Kode</th>
                                    <th width="40%">Nama Kategori</th>
                                    <th width="28%">Batas Peminjaman (minggu)</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $k)
                                    @if($k->nama == 'Buku Pelajaran')
                                        <tr>
                                            <td>{{ $k->id }}</td>
                                            <td>{{ $k->nama }}</td>
                                            <td>{{ $k->deadline }}</td>
                                            <td> 
                                                <a style="cursor:pointer;margin-left: 44px" id="edit_item" 
                                                data-toggle="modal" 
                                                data-target="#edit-modal"
                                                data-id="{{ $k->id }}"
                                                data-nama="{{ $k->nama }}"
                                                data-deadline="{{ $k->deadline }}">
                                                <i class="fas fa-edit ml-3 mr-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                    <tr>
                                        <td>{{ $k->id }}</td>
                                        <td>{{ $k->nama }}</td>
                                        <td>{{ $k->deadline }}</td>
                                        <td>
                                            <a style="cursor:pointer" id="edit_item" 
                                                data-toggle="modal" 
                                                data-target="#edit-modal"
                                                data-id="{{ $k->id }}"
                                                data-nama="{{ $k->nama }}"
                                                data-deadline="{{ $k->deadline }}">
                                                <i class="fas fa-edit ml-3 mr-2"></i>
                                            </a>
                                            <!-- <a href="{{ url('data_buku/edit_kategori/' . $k->id) }}"><i class="fas fa-edit" style="margin-right: 20px;margin-left: 15px"></i></a> -->
                                            <a href="{{ url('data_buku/hapus_kategori/' . $k->id) }}"  data-toggle="tooltip" id="pesan"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endif
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
                                <input class="form-control py-3" id="nama" name="nama" type="text" value="" />
                                <div id="error">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="deadline">Batas Peminjaman (minggu)</label>
                            <input class="form-control py-3" id="deadline" name="batas_peminjaman" type="text" value="" />
                            <div id="error">{{ $errors->first('deadline') }}</div>
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
            let deadline = $(this).data('deadline');
            let id = $(this).data('id');
            $('#deadline').val(deadline);
            
            if (nama == 'Buku Pelajaran') {
                $("#nama").attr("readonly", true);
            }else{
                $("#nama").attr("readonly", false);
            }
            $('#nama').val(nama);
            $('#edit_form').attr('action', '/data_buku/edit_kategori/' + id);
      })
    </script>
@endsection