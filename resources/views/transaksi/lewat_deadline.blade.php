@extends('partial.auth')

@section('title','Peminjaman Buku')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3" style="background-color: #E53935">
                <li class="breadcrumb-item" style="color: white">Peminjaman Lewat Batas Waktu!!!</li>
            </ol>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="10%">Id Transaksi</th>
                                    <th width="6%">NIS</th>
                                    <th width="13%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="13%">Kategori</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="8%">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lewat as $l)
                                    <tr>
                                        <td>{{ $l->id }}</td>
                                        <td>{{ $l-> anggota-> nis }}</td>
                                        <td>{{ $l-> anggota-> nama }}</td>
                                        <td>{{ $l-> buku-> judul }}</td>
                                        <td>{{ $l-> buku-> kategori-> nama }}</td>
                                        <td>{{ $l-> tgl_pinjam }}</td>
                                        <td>
                                            <a href="{{ url('peminjaman/kembali' . $l->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="kembali"><i class="fa-2x fas fa-check-square"></i></a>
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
         var tanya = confirm("Apakah Anda Yakin ingin Melakukan Pengembalian?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("kembali");
      }
    </script>
@endsection