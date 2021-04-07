<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Tampilan Laporan Peminjaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        table{
            font-size: 12px;
        }
        td{
            padding: 0px;
        }
    </style>

</head>
<body>
    <center>
        <h4>LAPORAN PEMINJAMAN BUKU<br>PERPUSTAKAAN SDN TAYUBAN </h4>
    </center>
    <table class="mb-2">
        <tr>
            <td width="50px">Bulan</td>
            <td>:</td>
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
                <th width="5px">No</th>
                <th width="10px">Id</th>
                <th width="15px">NIS</th>
                <th width="35px">Nama</th>
                <th width="35px">Judul Buku</th>
                <th width="30px">Kategori</th>
                <th width="25px">Pinjam</th>
                <th width="30px">Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d-> anggota-> nis }}</td>
                    <td>{{ $d-> anggota-> nama }}</td>
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
</body>
</html>
