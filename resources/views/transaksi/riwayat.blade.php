@extends('partial.auth')

@section('title','Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Riwayat Peminjaman Buku</li>
            </ol>
            <div class="card mb-4 p-2">
            	<div class="row row-peminjaman pb-1">
            		<div class="col-sm-8" style="padding-left: 0">
                        <a href="" class="btn btn-success pb-1 pt-1">
                            CETAK RIWAYAT PEMINJAMAN <i class="fas fa-print"></i>
                        </a>
					</div>
					<table style="margin-right: 0" class="col-sm-4 mr-0">
                        <form action="riwayat/cari_riwayat" method="get" >
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
                    <div class="dropdown">
                          <button class="btn btn-kategori dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Berdasarkan Kategori
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Buku Pelajaran</a>
                            <a class="dropdown-item" href="#">Buku Cerita</a>
                            <a class="dropdown-item" href="#">Kamus</a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Riwayat Peminjaman Buku
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-anggota" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="10%">Id Transaksi</th>
                                    <th width="7%">NIS</th>
                                    <th width="19%">Nama</th>
                                    <th width="32%">Judul Buku</th>
                                    <th width="11%">Tgl Pinjam</th>
                                    <th width="17%">Tgl Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat as $r)
                                <tr>
                                    <td>{{ $r-> id }}</td>
                                    <td>{{ $r-> anggota-> nis }}</td>
                                    <td>{{ $r-> anggota-> nama }}</td>
                                    <td>{{ $r-> buku-> judul }}</td>
                                    <td>{{ $r-> tgl_pinjam }}</td>
                                    <td>{{ $r-> tgl_kembali }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection