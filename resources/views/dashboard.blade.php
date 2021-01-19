@extends('partial.auth')

@section('title'.'Dashboard')

@section('content')
<header>
	<div class="left_area">
		<h3>Perpustakaan <span>SDN Tayuban</span></h3>
	</div>
	<div class="right_area">
		<a href="" class="logout_btn">Logout</a>
	</div>
</header>
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="#"><span>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="#"><span>Peminjaman Buku</span></a>
	<a href="#"><span>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href="#"><span>Data Buku</span></a>
	<a href="#"><span>Data Anggota</span></a>
	<a href="#"><span>Data Alat Peraga</span></a>
	<a href="#"><span>Struktur Organisasi</span></a>
	<div class="keterangan">Profil</div>
	<a href="#"><span>Edit Profil</span></a>
</div>
<div class="content" style="width: 100px">
	<h5>bbbbbbbbbbbb</h5>
</div>

@endsection