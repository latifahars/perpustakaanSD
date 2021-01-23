@extends('partial.auth')

@section('title','Dashboard')

@section('menu')
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="" class="active"><span><i class="fas fa-desktop"></i>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="/peminjaman"><span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
	<a href="/pengembalian"><span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href="/data_buku"><span><i class="fas fa-book"></i>  Data Buku</span></a>
	<a href="/data_anggota"><span><i class="fas fa-users"></i>Data Anggota</span></a>
	<a href="/data_peraga"><span><i class="fas fa-shapes"></i>  Data Alat Peraga</span></a>
	<a href="/struktur_org"><span><i class="fas fa-sitemap"></i>Struktur Organisasi</span></a>
	<div class="keterangan">Profil</div>
	<a href="/edit_profil"><span><i class="fas fa-edit"></i>Edit Profil</span></a>
</div>
@endsection

@section('content')
<div class="jumlah">
	<div class="row row-dashboard">
		<div>
			<div class="card card_jumlah card_1">
			  <div class="card-body" style="padding-bottom: 0">
			  	<i class="fa-5x fas fa-file-signature"></i>
			  	<h3>2</h3>
			  	<p>Peminjaman Buku</p>
			  </div>
			  <a href="">
				  <div class="card-footer">
				  	<p>Lihat Semua</p>
				    <i class="fas fa-chevron-circle-right"></i>
				  </div>
			  </a>
			</div>
		</div>
		<div>
			<div class="card card_jumlah card_2">
			  <div class="card-body">
			  	<i class="fa-5x fas fa-book"></i>
			  	<h3>2</h3>
			  	<p>Data Buku</p>
			  </div>
			  <a href="">
				  <div class="card-footer">
				  	<p>Lihat Semua</p>
				    <i class="fas fa-chevron-circle-right"></i>
				  </div>
			  </a>
			</div>
		</div>
	</div>
	<div class="row row-dashboard" style="margin-top: 30px">
		<div >
			<div class="card card_jumlah card_3">
			  <div class="card-body">
				<i class="fa-5x fas fa-users"></i>
			  	<h3>2</h3>
			  	<p>Data Anggota</p>
			  </div>
			  <a href="">
				  <div class="card-footer">
				  	<p>Lihat Semua</p>
				    <i class="fas fa-chevron-circle-right"></i>
				  </div>
			  </a>
			</div>
		</div>
		<div >
			<div class="card card_jumlah card_4">
			  <div class="card-body">
			  	<i class="fa-5x fas fa-shapes"></i>
			  	<h3>2</h3>
			  	<p>Data Alat Peraga</p>
			  </div>
			  <a href="">
				  <div class="card-footer">
				  	<p>Lihat Semua</p>
				    <i class="fas fa-chevron-circle-right"></i>
				  </div>
			  </a>
			</div>
		</div>
	</div>
</div>
@endsection

