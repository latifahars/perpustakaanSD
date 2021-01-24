@extends('partial.auth')

@section('title','Peminjaman')

@section('menu')
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="/dashboard"><span><i class="fas fa-desktop"></i>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="" class="active"><span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
	<a href="/pengembalian"><span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href="/data_buku"><span><i class="fas fa-book"></i>  Data Buku</span></a>
	<a href="/data_anggota"><span><i class="fas fa-users"></i>Data Anggota</span></a>
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
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Peminjaman Buku</li>
            </ol>
            <div class="card mb-4 p-3">
            	<div class="row row-peminjaman">
            		<div class="col-sm-9" style="padding-left: 0">
	                <div class="dropdown">
						  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Berdasarkan Kategori
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="#">Buku Pelajaran</a>
						    <a class="dropdown-item" href="#">Buku Cerita</a>
						    <a class="dropdown-item" href="#">Kamus</a>
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
                    Tabel Peminjaman Buku
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="/tambah_peminjaman" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-anggota" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="5%">No</th>
                                	<th width="12%">Id Transaksi</th>
                                    <th width="14%">NIS</th>
                                    <th width="20%">Nama</th>
                                    <th width="25%">Judul Buku</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="8%">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>200112349821</td>
                                    <td>24060118130080</td>
                                    <td>Latifah Arum Sari123</td>
                                    <td>Budidaya Ikan Lele dengan Mudah dan Murah</td>
                                    <td>2021-01-04</td>
                                    <td><a href="" ><i class="fa-2x fas fa-check-square"></i></a></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>200112349821</td>
                                    <td>24060118130080</td>
                                    <td>Latifah Arum S</td>
                                    <td>Kancil dan Buaya</td>
                                    <td>2021-01-04</td>
                                    <td><a href="" ><i class="fa-2x fas fa-check-square"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection