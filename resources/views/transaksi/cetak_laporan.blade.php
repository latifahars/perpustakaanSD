<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Tampilan Laporan Peminjaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        table{
            font-size: 12px;
            border-color: black;
        }
        td{
            padding: 0px;
        }
    </style>

</head>
<body>
    <center>
        <h5>LAPORAN PEMINJAMAN BUKU<br>PERPUSTAKAAN SDN TAYUBAN </h5>
    </center>
    <table class="mb-2" style="font-size: 14px">
        <tr>
            <td width="50px">Bulan</td>
            <td width="10px">:</td>
            <td> {{ $bulan_awal }} - {{ $bulan_akhir }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td> {{ $tahun }}</td>
        </tr>
    </table>
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th width="10px">No</th>
                <th width="15px">Id</th>
                <th width="15px">NIS</th>
                <th width="160px">Nama</th>
                <th width="65px">Kode Buku</th>
                <th>Judul Buku</th>
                <th width="110px">Kategori</th>
                <th width="65px">Pinjam</th>
                <th width="65px">Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d-> anggota-> nis }}</td>
                    <td>{{ $d-> anggota-> nama }}</td>
                    <td>{{ $d-> buku-> kode }}</td>
                    <td>{{ $d-> buku-> judul }}</td>
                    <td>{{ $d-> buku-> kategori-> nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->tgl_pinjam)->format('d-m-Y') }}</td>
                    @if($d->tgl_kembali != null)
                    <td>{{ \Carbon\Carbon::parse($d->tgl_kembali)->format('d-m-Y') }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <p></p>
</body>
</html>
