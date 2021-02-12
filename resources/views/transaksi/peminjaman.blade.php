@extends('partial.auth')

@section('title','Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Peminjaman Buku</li>
            </ol>
            <div class="card mb-4 p-2">
            	<div class="row row-peminjaman">
            		<div class="col-sm-8" style="padding-left: 0;margin-bottom: 0">
                        <a href="peminjaman/buku_pelajaran" class="btn btn-tambahbuku pb-2 pt-2">
                            Data Peminjaman Buku Pelajaran
                        </a>
                    </div>
					<table style="margin-right: 0" class="col-sm-4 mr-0">
                        <form action="peminjaman/cari_peminjaman" method="get" >
                        @csrf
                            <tr>
                                <td width="40%">
                                    <div class="form-group form-cari pr-0 mr-0">
                                        <input class="form-control" id="username" type="text" name="cari" placeholder="Cari"/>
                                    </div> 
                                </td>
                                <td width="10%">
                                     <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                                </td>
                            </tr>
                        </form>
                    </table>  
	            </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Peminjaman Buku
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="peminjaman/tambah_peminjaman" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-anggota" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="9%">Id Transaksi</th>
                                    <th width="6%">NIS</th>
                                    <th width="15%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="13%">Kategori</th>
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
                                        <td>{{ $p-> buku-> kategori-> nama }}</td>
                                        <td>{{ $p-> tgl_pinjam }}</td>
                                        <td><a href="{{ url('peminjaman/kembali' . $p->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="pesan"><i class="fa-2x fas fa-check-square"></i></a></td>
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
 
         document.getElementById("pesan");
      }
    </script>
@endsection