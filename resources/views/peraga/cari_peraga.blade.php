@extends('partial.auth')

@section('title','Data Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            @if ($peraga->isEmpty())
                <div class="pl-0 pr-0">
                    <div class="alert alert-danger mt-2 pb-1 pt-2">
                       <center><h5>Hasil Pencarian Tidak Ditemukan!</h5></center>
                    </div>
                    <a class="btn btn-success pt-1 pb-1" href="/data_peraga">Kembali</a>
                </div>
            @else
                <div class="alert alert-success mt-2 pb-1 pt-2">
                   <center><h5>Hasil Pencarian Ditemukan!</h5></center>
                </div>
                <a class="btn btn-success pt-1 pb-1 mb-1" href="/data_peraga">Kembali</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="9%">Kode</th>
                                <th width="20%">Nama</th>
                                <th width="12%">Kategori</th>
                                <th width="7%">Jumlah</th>
                                <th width="15%">Asal Perolehan</th>
                                <th width="11%">Tgl Diterima</th>
                                <th width="8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peraga as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p-> kode }}</td>
                                <td>{{ $p-> nama }}</td>
                                <td>{{ $p-> kategori-> nama }}</td>
                                <td>{{ $p-> jumlah }}</td>
                                <td>{{ $p-> sumber }}</td>
                                <td>{{ $p-> tgl_diterima }}</td>
                                <td>
                                    <a href="{{ url('data_peraga/edit_peraga/' . $p->id) }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ url('data_peraga/hapus_peraga/' . $p->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="pesan"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
    <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Yakin Akan Menghapus Data Peraga ini?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("pesan");
      }
    </script>
@endsection