@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Buku</li>
            </ol>
            <div class="card mb-2 p-2">
            	<div class="row row-peminjaman pr-2">
                    <div class="form-group col-sm-9 mb-0 pl-1 pr-0">
                        <a href="data_buku/tambah_buku" class="btn btn-primary pb-1 pt-1">TAMBAH BUKU <i class="fas fa-plus-circle"></i></a>
                        <a href="data_buku/import_buku" class="btn btn-import pb-1 pt-1">
                            IMPORT BUKU <i class="fas fa-file-upload"></i>
                        </a>
                    </div>
            		<div class="pl-0 col-sm-3">
                        <a href="data_buku/kategori" class="btn btn-tambahbuku pb-1 pt-1" type="submit" style="float: right;">
                            KATEGORI BUKU <i class="fas fa-layer-group"></i>
                        </a>
					</div>
	            </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="9%">Kode</th>
                                    <th width="23%">Judul Buku</th>
                                    <th>Kategori</th>
                                    <th width="14%">Penerbit</th>
                                    <th width="8%">Page</th>
                                    <th width="10%">Jumlah</th>
                                    <th width="12%">Asal</th>
                                    <th width="11%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $b)
                                <tr>
                                    <td>{{ $b-> kode }}</td>
                                    <td>{{ $b-> judul }}</td>
                                    <td>{{ $b-> kategori-> nama }}</td>
                                    <td>{{ $b-> penerbit-> nama }}</td>
                                    <td>{{ $b-> halaman }}</td>
                                    <td>{{ $b-> eksemplar }}</td>
                                    <td>{{ $b-> sumber-> nama }}</td>
                                    <td class="aksi-buku">
                                        <a href="{{ url('data_buku/detail_buku/' . $b->id) }}"><i class="fas fa-eye"></i></a>
                                    	<a href="{{ url('data_buku/edit_buku/' . $b->id) }}"><i class="fas fa-edit"></i></a>
                                    	<a href="{{ url('data_buku/hapus_buku/' . $b->id) }}" data-toggle="tooltip"  id="pesan"><i class="fas fa-trash-alt"></i></a>
                                    </td>
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