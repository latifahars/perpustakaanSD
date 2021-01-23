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
                <i class="fas fa-user-tie" style="margin-right: 10px"></i>Latifah Arum Sari
                <a href="/logout" class="btn btn-danger btn-logout">Logout</a>
            </div>
        </nav>
    </header>

    @yield('menu')

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