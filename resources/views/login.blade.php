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
        <center>@include('partial.alert')</center>
        <p><input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="password" placeholder="Password" required></p>
        <p><button type="submit" name="login">Login</button></p>
      </form>
    </div>
</body>
</html>