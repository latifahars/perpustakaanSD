<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="icon" href="{{ asset('tutwuri2.png') }}">
	<title>Hasil Pencarian Buku</title>
</head>
<body class="body">
    <header class="header-pencarian">
        <nav class="navbar navbar-default navbar-fixed-top left_area_cari">
            <h3>Perpustakaan <span style="color: #FFEE58">SDN Tayuban</span></h3>
            <div class="right_area">
                <a href="{{ url('pencarian_buku/pencarian_detail') }}" class="btn btn-danger btn-kembali">Kembali</a>
            </div>
        </nav>
    </header>
    <div class="content-pencarian" style="padding-top: 70px">
        @if ($data->isEmpty())
            <center>
                <div class="alert alert-danger mb-1" style="margin-top: 100px;width: 900px">
                    <h2>Hasil Pencarian Tidak Ditemukan</h2>
                    <div class="rectangle"></div>
                </div>
            </center>
        @else
            <center>
                <div class="alert alert-success mb-1" style="width: 700px">
                    <h5>Hasil Pencarian</h5>
                </div>
            </center>
            <div class="table-responsive" style="padding: 20px">
                <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">Kode</th>
                            <th>Judul Buku</th>
                            <th width="12%">Kategori</th>
                            <th width="12%">Penerbit</th>
                            <th width="18%">Pengarang</th>
                            <th width="9%">Halaman</th>
                            <th width="13%">Jumlah Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $b)
                        <tr>
                            <td>{{ $b-> kode }}</td>
                            <td>{{ $b-> judul }}</td>
                            <td>{{ $b-> kategori-> nama }}</td>
                            <td>{{ $b-> penerbit-> nama }}</td>
                            <td>
                                @foreach ($b->pengarang as $pengarang)
                                    {{$pengarang-> nama}} <br> 
                                @endforeach
                            </td>
                            <td>{{ $b-> halaman }}</td>
                            <td>{{ $b-> eksemplar }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</body>
</html>