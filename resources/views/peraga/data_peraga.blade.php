@extends('partial.auth')

@section('title','Data Alat Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Alat Peraga</li>
            </ol>
            <div class="card mb-2 p-2">
            	<div class="row row-peminjaman">
            		<div class="col-sm-9" style="padding-left: 0">
                        <div class="form-group pl-1 pr-0 mb-0">
                            <a href="data_peraga/tambah_peraga" class="btn btn-primary pb-1 pt-1">TAMBAH PERAGA <i class="fas fa-plus-circle"></i></a>
                            <a href="data_peraga/kategori" class="btn btn-tambahbuku pb-1 pt-1" type="submit">
                            KATEGORI PERAGA <i class="fas fa-layer-group"></i>
                            </a>
                        </div>
					</div>
                    <div class="col-sm-3" style="text-align: right;">
                        <a href="data_peraga/asal_perolehan" class="btn btn-asal pb-1 pt-1 mr-2" type="submit">
                            ASAL
                        </a>
                    </div>
	            </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-buku table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="6%">No</th>
                                	<th width="9%">Kode</th>
                                    <th width="17%">Nama</th>
                                    <th width="12%">Kategori</th>
                                    <th width="8%">Jumlah</th>
                                    <th width="12%">Asal Perolehan</th>
                                    <th width="11%">Tgl Diterima</th>
                                    <th width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peraga as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p-> kode }}</td>
                                    <td>{{ $p-> nama }}</td>
                                    <td>{{ $p-> kategori-> nama }}</td>
                                    <td>{{ $p-> jumlah }}</td>
                                    <td>{{ $p-> sumber }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tgl_diterima)->format('d-m-Y') }}</td>
                                    <td>
                                    	<a href="{{ url('data_peraga/edit_peraga/' . $p->id) }}"><i class="fas fa-edit"></i></a>
                                    	<a href="{{ url('data_peraga/hapus_peraga/' . $p->id) }}" data-toggle="tooltip" id="pesan"><i class="fas fa-trash-alt pr-0 ml-3"></i></a>
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