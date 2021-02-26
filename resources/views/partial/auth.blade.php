<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
	<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
	<title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top left_area">
            <h3>Perpustakaan <span>SDN Tayuban</span></h3>
            <div class="right_area">
                <i class="fas fa-user-tie" style="margin-right: 10px"></i>
                {{ auth()->user()->name }}
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
            <a href="/riwayat" class="{{ Request::is('riwayat*') ? 'active' : '' }}">
                <span><i class="fas fa-history"></i>Riwayat Peminjaman</span></a>
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

    </div>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#datatable').DataTable();
        })

        $(document).on('click', '#pesan', function(e){
                e.preventDefault();
                var link = $(this).attr('href');
                
                Swal.fire({
                    title: 'Yakin Dihapus?',
                    text: "Data akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Hapus',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                })
            })
    </script>

</body>
</html>