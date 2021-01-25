@extends('partial.auth')

@section('title','Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Pengembalian Buku</li>
            </ol>
            <div class="card mb-4 p-3">
            	<div class="row row-peminjaman">
            		<div class="col-sm-9" style="padding-left: 0">
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
					<div class="form-group form-cari">
		                <input class="form-control" id="username" type="text" placeholder="Cari"/>
		            </div>
	            </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Pengembalian Buku
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-anggota" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="5%">No</th>
                                	<th width="10%">Id Transaksi</th>
                                    <th width="14%">NIS</th>
                                    <th width="20%">Nama</th>
                                    <th width="25%">Judul Buku</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="10%">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>12345</td>
                                    <td>24060118130080</td>
                                    <td>Latifah Arum Sari123</td>
                                    <td>Budidaya Ikan Lele dengan Mudah dan Murah</td>
                                    <td>2021-01-04</td>
                                    <td>2021-01-04</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>12345</td>
                                    <td>24060118130080</td>
                                    <td>Latifah Arum S</td>
                                    <td>Kancil dan Buaya</td>
                                    <td>2021-01-04</td>
                                    <td>2021-01-04</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection