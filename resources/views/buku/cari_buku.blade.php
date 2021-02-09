@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            @if ($buku->isEmpty())
                <div class="pl-0 pr-0">
                    <div class="alert alert-danger mt-2 pb-1 pt-2">
                       <center><h5>Hasil Pencarian Tidak Ditemukan!</h5></center>
                    </div>
                    <a class="btn btn-success pt-1 pb-1" href="/data_buku">Kembali</a>
                </div>
            @else
                <div class="alert alert-success mt-2 pb-1 pt-2">
                   <center><h5>Hasil Pencarian Ditemukan!</h5></center>
                </div>
                <a class="btn btn-success pt-1 pb-1 mb-1" href="/data_buku">Kembali</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">Kode Buku</th>
                                <th width="25%">Judul Buku</th>
                                <th>Kategori</th>
                                <th width="10%">Penerbit</th>
                                <th width="8%">Halaman</th>
                                <th width="9%">Eksemplar</th>
                                <th width="15%">Asal Perolehan</th>
                                <th width="11%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $b)
                                <tr>
                                    <td>{{ $b-> kode }}</td>
                                    <td>{{ $b-> judul }}</td>
                                    <td>{{ $b-> kategori-> nama }}</td>
                                    <td>{{ $b-> penerbit-> nama }}</td>
                                    <td>{{ $b-> halaman }}</td>
                                    <td>{{ $b-> eksemplar }}</td>
                                    <td>{{ $b-> sumber-> nama }}</td>
                                    <td class="aksi-buku">
                                        <a href="{{ url('data_buku/detail_buku/' . $b->id) }}"><i class="fas fa-eye"></i></a>
                                        <a href="{{ url('data_buku/edit_buku/' . $b->id) }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('data_buku/hapus_buku/' . $b->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="pesan"><i class="fas fa-trash-alt"></i></a>
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
         var tanya = confirm("Apakah Anda Yakin Akan Menghapus Data Anggota ini?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("pesan");
      }
    </script>
@endsection