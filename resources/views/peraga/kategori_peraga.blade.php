@extends('partial.auth')

@section('title','Data Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.alert')
            @include('partial.error')
            <div class="card mb-4">
                <div class="card-header">
                    <form method="post" action="">
                         <a href="{{ url('data_peraga') }}"><i class="fas fa-chevron-circle-left mt-2 mr-1"></i></a>
                         Daftar Kategori
                        @csrf
                        <table style="float: right;">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" style="width: 200px" name="nama" placeholder="Nama Kategori">
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
                        <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="5%">No</th>
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
                                    <td></td>
                                    <td>
                                        <a href="{{ url('data_peraga/edit_kategori/' . $k->id) }}"><i class="fas fa-edit" style="margin-right: 20px;margin-left: 15px"></i></a>
                                        <a href="{{ url('data_peraga/hapus_kategori/' . $k->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="pesan"><i class="fas fa-trash-alt"></i></a>
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
    <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Yakin Akan Menghapus Kategori ini?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("pesan");
      }
    </script>
@endsection