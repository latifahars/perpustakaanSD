@extends('partial.auth')

@section('title','Tambah Alat Peraga')

@section('menu')
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="/dashboard"><span><i class="fas fa-desktop"></i>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="/peminjaman"><span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
	<a href="/pengembalian"><span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href="/data_buku"><span><i class="fas fa-book"></i>  Data Buku</span></a>
	<a href="/data_anggota"><span><i class="fas fa-users"></i>Data Anggota</span></a>
	<a href="/data_peraga"class="active"><span><i class="fas fa-shapes"></i>  Data Alat Peraga</span></a>
	<a href="/struktur_org"><span><i class="fas fa-sitemap"></i>Struktur Organisasi</span></a>
	<div class="keterangan">Profil</div>
	<a href="/edit_profil"><span><i class="fas fa-user-edit"></i>Edit Profil</span></a>
</div>
@endsection

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shapes"></i>
                    Tambah Alat Peraga
                </div>
                <div class="card-body">
                    <table class="table-tambahperaga">
                        <tr>
                            <td><label for="kode">Kode</label></td>
                            <td width="100%">
                                <div class="form-group">
                                    <input class="form-control py-3" id="kode" type="text" placeholder="Masukkan Kode" autofocus />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="nama">Nama</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="nama" type="text" placeholder="Masukkan Nama Alat" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kategori">Kategori</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="kategori" type="text" placeholder="Masukkan Kategori" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="jumlah">Jumlah</label></td>
                            <td>
                                 <div class="form-group">
                                    <input class="form-control py-3" id="jumlah" type="text" placeholder="Masukkan Jumlah" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sumber">Sumber</label></td>
                            <td>
                               <div class="form-group">
                                    <input class="form-control py-3" id="sumber" type="text" placeholder="Masukkan Sumber" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="date">Tanggal Diterima</label></td>
                            <td>
                                <input
                                class="form-control report"
                                id="date"
                                type="date"
                                name="date"
                                value=""
                                />
                            </td>
                        </tr>
                    </table>
                    <div class="form-group mt-4 mb-0">
                        <a class="btn btn-danger" style="float: left;" href="/data_anggota">Batal</a>
                        <a class="btn btn-success" style="float: right;" href="">Simpan</a>
                    </div>
                </div>   
            </div>
        </div>
    </main>
@endsection