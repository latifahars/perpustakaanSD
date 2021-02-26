<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bbootstrap/js/bootstrap.min.js"></script>
	<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
	<title>Pencarian Buku</title>
</head>
<body class="body-pencarian">
    <header class="header-pencarian">
        <nav class="navbar navbar-default navbar-fixed-top left_area">
            <h3>Perpustakaan <span style="color: #FFEE58">SDN Tayuban</span></h3>
        </nav>
    </header>
    <div class="content-pencarian">
        <center>
            <div class="card card-pencarian">
                <div class="body">
                    <h3>PENCARIAN BUKU</h3>
                    <table style="margin-top: 100px; margin-bottom: 80px">
                        <tr>
                            <td>
                                <input type="text" class="form-control cari" name="cari" placeholder="Masukkan Identitas Buku" autofocus>
                            </td>
                            <td>
                                <button class="btn btn-cari pb-1 pt-1" type="submit"><i class="fas fa-search"></i> Cari</button>
                            </td>
                        </tr>
                    </table>
                    <a class="btn btn-semua pt-2" href="{{ url('pencarian_buku/semua_buku') }}" >Semua Buku</a>
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