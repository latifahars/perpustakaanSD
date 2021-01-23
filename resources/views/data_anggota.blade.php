@extends('partial.auth')

@section('title','Data Anggota')

@section('menu')
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="/dashboard"><span><i class="fas fa-desktop"></i>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="/peminjaman"><span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
	<a href="/pengembalian"><span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href="/data_buku"><span><i class="fas fa-book"></i>  Data Buku</span></a>
	<a href=""class="active"><span><i class="fas fa-users"></i>Data Anggota</span></a>
	<a href="/data_peraga"><span><i class="fas fa-shapes"></i>  Data Alat Peraga</span></a>
	<a href="/struktur_org"><span><i class="fas fa-sitemap"></i>Struktur Organisasi</span></a>
	<div class="keterangan">Profil</div>
	<a href="/edit_profil"><span><i class="fas fa-user-edit"></i>Edit Profil</span></a>
</div>
@endsection

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Anggota</li>
            </ol>
            <div class="card mb-4 p-3">
            	<div class="row row-peminjaman">
            		<div class="col-sm-9" style="padding-left: 0">
	                <div class="dropdown">
						  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Berdasarkan Kelas
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="#">Kelas 1</a>
						    <a class="dropdown-item" href="#">Kelas 2</a>
						    <a class="dropdown-item" href="#">Kelas 3</a>
						  </div>
					</div>
					</div>
					<div class="form-group form-cari">
		                <input class="form-control" id="username" type="text" placeholder="Cari"/>
		            </div>
	            </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Data Anggota
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="10px">No</th>
                                    <th width="90px">NIS</th>
                                    <th width="300px">Nama</th>
                                    <th width="150px">Kelas</th>
                                    <th width="60px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>24060118130080</td>
                                    <td>Latifah Arum Sari123</td>
                                    <td>Kelas 1</td>
                                    <td>
                                    	<a href=""><i class="fa-2x fas fa-edit"></i></a>
                                    	<a href=""><i class="fa-2x fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>24060118130080</td>
                                    <td>Latifah Arum Sari123</td>
                                    <td>Kelas 1</td>
                                    <td>
                                    	<a href=""><i class="fa-2x fas fa-edit"></i></a>
                                    	<a href=""><i class="fa-2x fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection