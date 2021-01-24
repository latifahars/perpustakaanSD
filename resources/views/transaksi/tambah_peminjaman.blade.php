@extends('partial.auth')

@section('title','Tambah Peminjaman')

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
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-file-signature"></i>
                    Tambah Peminjaman Buku
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="mb-1" for="nis">NIS</label>
                        <input class="form-control py-3" id="nis" type="text" placeholder="Masukkan NIS" autofocus />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="nama">Nama</label>
                        <input class="form-control py-3" id="nama" type="text" placeholder="Masukkan Nama" autofocus />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="kode">Kode Buku</label>
                        <input class="form-control py-3" id="kode" type="text" placeholder="Masukkan Kode Buku" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input
                            class="form-control report"
                            id="date"
                            type="date"
                            name="date"
                            value=""
                        />
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <a class="btn btn-danger" style="float: left;" href="">Batal</a>
                        <a class="btn btn-success" style="float: right;" href="">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection