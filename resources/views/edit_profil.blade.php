@extends('partial.auth')

@section('title','Edit Profil')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Profil</a></li>
                <li class="breadcrumb-item">Edit Profil</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Edit Profil
                </div>
                <div class="card-body">
	                <div class="form-group">
	                    <label class="mb-1" for="username">Username</label>
	                    <input class="form-control py-3" id="username" type="text" placeholder="Masukkan Username" autofocus />
	                </div>
	                <div class="form-group">
	                    <label class="mb-1" for="password">Password</label>
	                    <input class="form-control py-3" id="password" type="password" placeholder="Masukkan Password" />
	                </div>
	                <div class="form-group mt-4 mb-0">
	                	<a class="btn btn-danger" style="float: left;" href="">Batal</a>
	                    <a class="btn btn-success" style="float: right;" href="">Simpan</a>
	                </div>
                </div>
            </div>
        </div>
    </main>

@endsection