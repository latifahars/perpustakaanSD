@extends('partial.auth')

@section('title','Dashboard')

@section('content')
<div class="jumlah">
	<div class="row row-dashboard">
		<div class="card card_jumlah card_1">
		  <div class="card-body" style="padding-bottom: 0">
		  	<i class="fa-5x fas fa-file-signature"></i>
		  	<h3>{{ $peminjaman }}</h3>
		  	<p>Peminjaman Buku</p>
		  </div>
		  <a href="{{ url('peminjaman')}}">
			  <div class="card-footer">
			  	<p>Lihat Semua</p>
			    <i class="fas fa-chevron-circle-right"></i>
			  </div>
		  </a>
		</div>
		<div class="card card_jumlah card_2">
		  <div class="card-body">
		  	<i class="fa-5x fas fa-exclamation-triangle"></i>
		  	<h3>{{ $deadline }}</h3>
		  	<p>Lewat Deadline</p>
		  </div>
		  <a href="{{ url('peminjaman/lewat_deadline')}}">
			  <div class="card-footer">
			  	<p>Lihat Semua</p>
			    <i class="fas fa-chevron-circle-right"></i>
			  </div>
		  </a>
		</div>
	</div>
	<div class="row row-dashboard" style="margin-top: 30px">
		<div class="card card_jumlah card_3">
		  <div class="card-body">
		  	<i class="fa-5x fas fa-book"></i>
		  	<h3>{{ $buku }}</h3>
		  	<p>Data Buku</p>
		  </div>
		  <a href="{{ url('data_buku')}}">
			  <div class="card-footer">
			  	<p>Lihat Semua</p>
			    <i class="fas fa-chevron-circle-right"></i>
			  </div>
		  </a>
		</div>
		<div class="card card_jumlah card_4">
		  <div class="card-body">
			<i class="fa-5x fas fa-users"></i>
		  	<h3>{{ $anggota }}</h3>
		  	<p>Data Anggota</p>
		  </div>
		  <a href="{{ url('data_anggota')}}">
			  <div class="card-footer">
			  	<p>Lihat Semua</p>
			    <i class="fas fa-chevron-circle-right"></i>
			  </div>
		  </a>
		</div>
	</div>
	<div class="" style="margin-top: 30px;margin-left: 200px">
		<div>
			<div class="card card_jumlah card_5">
			  <div class="card-body">
			  	<i class="fa-5x fas fa-shapes"></i>
			  	<h3>{{ $peraga }}</h3>
			  	<p>Data Alat Peraga</p>
			  </div>
			  <a href="{{ url('data_peraga')}}">
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

