@extends('partial.auth')

@section('title','Data Alat Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Alat Peraga</li>
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
                    Tabel Data Alat Peraga
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="data_peraga/tambah_peraga" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="5%">No</th>
                                	<th width="9%">Kode</th>
                                    <th width="25%">Nama</th>
                                    <th width="9%">Kategori</th>
                                    <th width="7%">Jumlah</th>
                                    <th width="14%">Sumber</th>
                                    <th width="11%">Tgl Diterima</th>
                                    <th width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2221111</td>
                                    <td>Tengkorak Manusia</td>
                                    <td>IPA</td>
                                    <td>1</td>
                                    <td>Beli</td>
                                    <td>2020-12-02</td>
                                    <td>
                                    	<a href="data_peraga/edit_peraga"><i class="fas fa-edit"></i></a>
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