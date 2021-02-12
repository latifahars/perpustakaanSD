@extends('partial.auth')

@section('title','Pengembalian')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            @if ($riwayat->isEmpty())
                <div class="pl-0 pr-0">
                    <div class="alert alert-danger mt-2 pb-1 pt-2">
                       <center><h5>Hasil Pencarian Tidak Ditemukan!</h5></center>
                    </div>
                    <a class="btn btn-success pt-1 pb-1" href="/riwayat">Kembali</a>
                </div>
            @else
                <div class="alert alert-success mt-2 pb-1 pt-2">
                   <center><h5>Hasil Pencarian Ditemukan!</h5></center>
                </div>
                <a class="btn btn-success pt-1 pb-1 mb-1" href="/riwayat">Kembali</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-buku" id="dataTable" width="100%" cellspacing="0">
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
            @endif
        </div>
    </main>
@endsection