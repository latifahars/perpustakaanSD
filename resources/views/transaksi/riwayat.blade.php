@extends('partial.auth')

@section('title','Riwayat Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Riwayat Peminjaman Buku</li>
            </ol>
            		<div class="mb-2">
                        <a href="" class="btn btn-success pb-1 pt-1">
                            CETAK RIWAYAT PEMINJAMAN <i class="fas fa-print"></i>
                        </a>
					</div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="13%">Id Transaksi</th>
                                    <th width="7%">NIS</th>
                                    <th width="19%">Nama</th>
                                    <th width="29%">Judul Buku</th>
                                    <th width="13%">Tgl Pinjam</th>
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
                                    <td>{{ \Carbon\Carbon::parse($r->tgl_pinjam)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->tgl_kembali)->format('d-m-Y H:i') }}</td>
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