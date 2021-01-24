@extends('partial.auth')

@section('title','Data Buku')

@section('menu')
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="/dashboard"><span><i class="fas fa-desktop"></i>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="/peminjaman"><span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
	<a href="/pengembalian"><span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href=""class="active"><span><i class="fas fa-book"></i>  Data Buku</span></a>
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
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Buku</li>
            </ol>
            <div class="card mb-4 p-3">
            	<div class="row row-peminjaman">
            		<div class="col-sm-9" style="padding-left: 0">
                        <form method="post" action="">
                            @csrf
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Kategori">
                                    </td>
                                    <td>
                                        <button class="btn btn-tambahbuku" type="submit"><i class="fas fa-plus"></i> Tambah</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
					</div>
					<div class="form-group form-cari">
		                <input class="form-control" id="username" type="text" placeholder="Cari"/>
		            </div>
	            </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Data Buku
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="12%">Kode Buku</th>
                                    <th width="25%">Judul Buku</th>
                                    <th>Kategori</th>
                                    <th width="10%">Penerbit</th>
                                    <th width="8%">Halaman</th>
                                    <th width="9%">Eksemplar</th>
                                    <th>Sumber</th>
                                    <th width="10%">Tgl Diterima</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>200112349821</td>
                                    <td>Kancil dan Buaya</td>
                                    <td>Buku Cerita</td>
                                    <td>Yogyakarta: Erlangga</td>
                                    <td>23</td>
                                    <td>3</td>
                                    <td>Kemendikbud</td>
                                    <td>2020-12-01</td>
                                    <td>
                                    	<a href=""><i class="fas fa-edit"></i></a>
                                    	<a href=""><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>200112349821</td>
                                    <td>Budidaya Ikan Lele dengan Mudah dan Murah</td>
                                    <td>Buku Pengembangan Potensi Anak</td>
                                    <td>Yogyakarta: Cita Karya Bangsa</td>
                                    <td>23</td>
                                    <td>3</td>
                                    <td>Dinas Pariwista Kota Yogyakarta</td>
                                    <td>2020-12-01</td>
                                    <td>
                                    	<a href=""><i class="fas fa-edit"></i></a>
                                    	<a href=""><i class="fas fa-trash-alt"></i></a>
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