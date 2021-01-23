@extends('partial.auth')

@section('title','Edit Profil')

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
	<a href="/data_peraga"><span><i class="fas fa-shapes"></i>  Data Alat Peraga</span></a>
	<a href="/struktur_org"><span><i class="fas fa-sitemap"></i>Struktur Organisasi</span></a>
	<div class="keterangan">Profil</div>
	<a href=""class="active"><span><i class="fas fa-user-edit"></i>Edit Profil</span></a>
</div>
@endsection

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Profil</a></li>
                <li class="breadcrumb-item">Edit Profil</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Edit Profil
                </div>
                <div class="card-body">
	                <div class="form-group">
	                    <label class="mb-1" for="username">Username</label>
	                    <input class="form-control py-3" id="username" type="text" placeholder="Masukkan Username" autofocus />
	                </div>
	                <div class="form-group">
	                    <label class="mb-1" for="password">Password</label>
	                    <input class="form-control py-3" id="password" type="password" placeholder="Masukkan Password" />
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