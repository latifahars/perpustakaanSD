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
	<title>@yield('title')</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    @endif
    <header>
        <nav class="navbar navbar-default navbar-fixed-top left_area">
            <h3>Perpustakaan <span>SDN Tayuban</span></h3>
            <div class="right_area">
                <i class="fas fa-user-tie" style="margin-right: 10px"></i>
                Latifah Arum Sari
                <a href="/logout" class="btn btn-danger btn-logout">Logout</a>
            </div>
        </nav>
    </header>

    <ul class="sidebar" style="padding: 0">
        <li>
            <div class="keterangan">Dashboard</div>
            <a href="/dashboard" class="{{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <span><i class="fas fa-desktop"></i>Dashboard</span></a>
        </li>
        <li><div class="keterangan">Transaksi</div></li>
        <li>
            <a href="/peminjaman" class="{{ Request::is('peminjaman*') ? 'active' : '' }}">
                <span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
        </li>
        <li>
            <a href="/pengembalian" class="{{ Request::is('pengembalian*') ? 'active' : '' }}">
                <span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
            <div class="keterangan">Data</div>
        </li> 
        <li>
            <a href="/data_buku" class="{{ Request::is('data_buku*') ? 'active' : '' }}">
                <span><i class="fas fa-book"></i>  Data Buku</span></a>
        </li>
        <li>
            <a href="/data_anggota" class="{{ Request::is('data_anggota*') ? 'active' : '' }}">
                <span><i class="fas fa-users"></i>Data Anggota</span></a>
        </li>
        <li>
            <a href="/data_peraga" class="{{ Request::is('data_peraga*') ? 'active' : '' }}">
                <span><i class="fas fa-shapes"></i>  Data Alat Peraga</span></a>
        </li>
        <li>
            <a href="/struktur_org" class="{{ Request::is('struktur_org*') ? 'active' : '' }}">
                <span><i class="fas fa-sitemap"></i>Struktur Organisasi</span></a>
        </li>
        <li><div class="keterangan">Profil</div></li>
        <li>
            <a href="/edit_profil" class="{{ Request::is('edit_profil*') ? 'active' : '' }}">
                <span><i class="fas fa-user-edit"></i>Edit Profil</span></a>
        </li>
    </ul>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).on('click', 'ul li' , function(){
            $(this).addClass('active').removeClass('active')
        })
    </script>

    <div class="content">

        @yield('content')

        <!-- <div id="layoutAuthentication_footer">
        <footer class="py-3 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="small">
                        <div class="text-muted" style="text-align: center;">Copyright &copy; Perpustakaan SDN Tayuban 2021</div>
                    </div>
                </div>
            </footer>
        </div> -->
    </div>
</body>
</html>