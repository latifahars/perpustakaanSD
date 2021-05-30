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
	<title>Pencarian Detail Buku</title>
</head>
<body class="body-detailpencarian">
    <header class="header-pencarian">
        <nav class="navbar navbar-default navbar-fixed-top left_area_cari">
            <h3>Perpustakaan <span style="color: #FFEE58">SDN Tayuban</span></h3>
            <div class="right_area">
                <a href="{{ url('pencarian_buku') }}" class="btn btn-danger btn-kembali">Kembali</a>
            </div>
        </nav>
    </header>
    <div class="content-pencarian">
        <center>
            <div class="card card-detailpencarian">
                <div class="body mr-2 ml-2">
                    <h3>PENCARIAN DETAIL BUKU</h3>
                    <form method="get" action="/pencarian_buku/hasil_pencarian_detail">
                        @csrf
                        <table style="margin-top: 80px; margin-bottom: 30px;width: 100%">
                            <tr>
                                <td>
                                    <input type="text" class="form-control cari-detail" name="kode" placeholder="Kode Buku">
                                    <div id="error">{{ $errors->first('kode') }}</div>

                                </td>
                                <td>
                                    <input type="text" class="form-control cari-detail" name="judul" placeholder="Judul Buku">
                                    <div id="error">{{ $errors->first('judul') }}</div>
                                </td>
                                <td>
                                    <div class="form-group bk-c mb-0 cari-detail">
                                        <select id="kategori" name="kategori" style="width: 100%;height: 100%;">
                                                <option selected disabled>--- Pilih Kategori ---</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="error">{{ $errors->first('kategori') }}</div>
                                </td>
                                <td>
                                    <input type="text" class="form-control cari-detail" name="penerbit" placeholder="Penerbit Buku">
                                    <div id="error">{{ $errors->first('penerbit') }}</div>

                                </td>
                                <td>
                                    <input type="text" class="form-control cari-detail" name="pengarang" placeholder="Pengarang Buku">
                                    <div id="error">{{ $errors->first('pengarang') }}</div>

                                </td>
                            </tr>
                        </table>
                        <div class="mb-5">                           
                            <p>Catatan : Tidak harus diisikan semua, isikan yang ingin dicari saja</p>
                        </div>
                        <button class="btn btn-cari ml-1" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </form>
                </div>
            </div>
        </center>

        <div style="bottom: auto; padding-top: 35px">
            <footer class="py-3 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="small">
                        <div class="text-muted" style="text-align: center;">Copyright &copy; Perpustakaan SDN Tayuban 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>