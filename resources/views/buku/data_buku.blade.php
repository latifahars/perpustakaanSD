@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Buku</li>
            </ol>
            <div class="card mb-4 p-2">
            	<div class="row row-peminjaman">
            		<div class="col-sm-8" style="padding-left: 0">
                        <a href="data_buku/import_buku" class="btn btn-import pb-1 pt-1">
                            IMPORT BUKU <i class="fas fa-file-upload"></i>
                        </a>
					</div>
					<table style="margin-right: 0" class="col-sm-4 mr-0">
                        <form action="data_buku/cari" method="get" >
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
                <div class="row row-peminjaman">
                    <div class="form-group mb-0">
                        <a href="data_buku/kategori" class="btn btn-tambahbuku pb-1 pt-1" type="submit">
                            KATEGORI BUKU
                        </a>
                    </div>
                </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Data Buku
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="data_buku/tambah_buku" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="9%">Kode Buku</th>
                                    <th width="24%">Judul Buku</th>
                                    <th>Kategori</th>
                                    <th width="14%">Penerbit</th>
                                    <th width="8%">Halaman</th>
                                    <th width="9%">Eksemplar</th>
                                    <th width="12%">Asal Perolehan</th>
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
                </div>
            </div>
        </div>
    </main>
    <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Yakin Akan Menghapus Data Buku ini?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("pesan");
      }
    </script>

@endsection