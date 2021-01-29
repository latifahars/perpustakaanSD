@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Buku</li>
            </ol>
            <div class="card mb-4 p-2">
            	<div class="row row-peminjaman">
            		<div class="col-sm-9" style="padding-left: 0;margin-bottom: 10px">
                        <a href="" class="btn btn-import pb-1 pt-1">
                            IMPORT EXCEL <i class="fas fa-file-upload"></i>
                        </a>
					</div>
					<div class="form-group form-cari">
		                <input class="form-control" id="username" type="text" placeholder="Cari"/>
		            </div>
	            </div>
                <div class="row row-peminjaman">
                    <form method="post" action="">
                        @csrf
                        <table>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Kategori">
                                </td>
                                <td>
                                    <button class="btn btn-tambahbuku pb-1 pt-1" type="submit"><i class="fas fa-plus"></i> Tambah</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Data Buku
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="data_buku/tambah_buku" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="10%">Kode Buku</th>
                                    <th width="25%">Judul Buku</th>
                                    <th>Kategori</th>
                                    <th width="10%">Penerbit</th>
                                    <th width="8%">Halaman</th>
                                    <th width="9%">Eksemplar</th>
                                    <th width="15%">Asal Perolehan</th>
                                    <th width="11%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>9-12-CKB-B</td>
                                    <td>Budidaya Ikan Lele dengan Mudah dan Murah</td>
                                    <td>Buku Paket</td>
                                    <td>Cita Karya Bangsa</td>
                                    <td>23</td>
                                    <td>3</td>
                                    <td>Dinas Pariwista Kota Yogyakarta</td>
                                    <td class="aksi-buku">
                                        <a href="data_buku/detail_buku"><i class="fas fa-eye"></i></a>
                                    	<a href="data_buku/edit_buku"><i class="fas fa-edit"></i></a>
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