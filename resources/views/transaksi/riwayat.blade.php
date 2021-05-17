@extends('partial.auth')

@section('title','Riwayat Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Riwayat Peminjaman Buku</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <table class="table table-bordered  table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="0%" style="display: none;">No</th>
                                	<th width="6%">Id</th>
                                    <th width="6%">NIS</th>
                                    <th width="12%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="11%">Batas Waktu</th>
                                    <th width="13%">Waktu Kembali</th>
                                    <th width="11%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat as $r)
                                <tr>
                                    <td style="display: none;">{{ $loop->iteration }}</td>
                                    <td>{{ $r-> id }}</td>
                                    <td>{{ $r-> anggota-> nis }}</td>
                                    <td>{{ $r-> anggota-> nama }}</td>
                                    <td>{{ $r-> buku-> judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->tgl_pinjam)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->deadline)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->tgl_kembali)->format('d-m-Y H:i') }}</td>
                                    <td>@if($r->deadline < $r->tgl_kembali)
                                            <div style="color: red"> Terlambat</div>
                                        @else
                                            Tidak Terlambat
                                        @endif
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