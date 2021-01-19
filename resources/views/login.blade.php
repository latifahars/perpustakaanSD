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
<body>
	@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    @endif
	<div class="bg-primary">
		<div id="layoutAuthentication">
		    <div id="layoutAuthentication_content">
		        <main>
		            <div class="container">
		                <div class="row justify-content-center">
		                    <div class="col-lg-5">
		                        <div class="card shadow-lg border-0 rounded-lg mt-5">
		                            <div class="card-header header-login">
		                            	<h3 class="text-center font-weight-light mt-2 mb-0">Selamat Datang!</h3>
		                            	<h5 class="text-center mt-1"> Sistem Informasi Perpustakaan SDN Tayuban</h5>
		                            </div>
		                            <div class="card-body">
		                                <form>
		                                	@csrf

								            @if ($errors->any())
								                @foreach ($errors->all() as $error)
								                    {{ $error }}
								                @endforeach
								            @endif
		                                    <div class="form-group">
		                                        <label class="mb-1" for="username">Username</label>
		                                        <input class="form-control py-3" id="username" type="text" placeholder="Masukkan Username" autofocus />
		                                    </div>
		                                    <div class="form-group">
		                                        <label class="mb-1" for="password">Password</label>
		                                        <input class="form-control py-3" id="password" type="password" placeholder="Masukkan Password" />
		                                    </div>
		                                    <div class="form-group mt-4 mb-0">
		                                        <center><a class="btn btn-primary" href="index.html">Login</a></center>
		                                    </div>
		                                </form>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </main>
		    </div>
		    <div id="layoutAuthentication_footer">
		        <footer class="py-3 bg-light mt-auto">
		            <div class="container-fluid">
		                <div class="small">
		                    <div class="text-muted" style="text-align: center;">Copyright &copy; Perpustakaan SDN Tayuban 2021</div>
		                </div>
		            </div>
		        </footer>
		    </div>
		</div>
	</div>
</body>
</html>