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
	<title>Login</title>
</head>
<body class="body-login">
    <div class="login">
      <div class="login-triangle"></div>
      <div class="login-header">
        <h2>Selamat Datang!</h2>
        <h6>Perpustakaan SDN Tayuban</h6>
      </div>
      <form name="login" method="post" action="{{ url('login') }}" class="login-container">
        @csrf
        @include('partial.error')
        <p><input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="password" placeholder="Password" required></p>
        <p><button type="submit" name="login">Login</button></p>
      </form>
    </div>
    <div style="bottom: auto; margin-top: 189px">
        <footer class="py-3 bg-light mt-auto">
            <div class="container-fluid">
                <div class="small">
                    <div class="text-muted" style="text-align: center;">Copyright &copy; Perpustakaan SDN Tayuban 2021</div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>