@extends('partial.auth')

@section('title','Peminjaman')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            @if ($peminjaman->isEmpty())
                <div class="pl-0 pr-0">
                    <div class="alert alert-danger mt-2 pb-1 pt-2">
                       <center><h5>Hasil Pencarian Tidak Ditemukan!</h5></center>
                    </div>
                    <a class="btn btn-success pt-1 pb-1" href="/peminjaman">Kembali</a>
                </div>
            @else
                <div class="alert alert-success mt-2 pb-1 pt-2">
                   <center><h5>Hasil Pencarian Ditemukan!</h5></center>
                </div>
                <a class="btn btn-success pt-1 pb-1 mb-1" href="/peminjaman">Kembali</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="11%">Id Transaksi</th>
                                <th width="8%">NIS</th>
                                <th width="20%">Nama</th>
                                <th width="32%">Judul Buku</th>
                                <th width="10%">Tgl Pinjam</th>
                                <th width="8%">Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p-> anggota-> nis }}</td>
                                    <td>{{ $p-> anggota-> nama }}</td>
                                    <td>{{ $p-> buku-> judul }}</td>
                                    <td>{{ $p-> tgl_pinjam }}</td>
                                    <td><a href="{{ url('peminjaman/kembali' . $p->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="pesan"><i class="fa-2x fas fa-check-square"></i></a></td>
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
         var tanya = confirm("Apakah Anda Yakin ingin Melakukan Pengembalian?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("pesan");
      }
    </script>
@endsection