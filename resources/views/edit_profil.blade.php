@extends('partial.auth')

@section('title','Edit Profil')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Profil</a></li>
                <li class="breadcrumb-item">Edit Profil</li>
            </ol>
            <div class="card mb-2 p-2">
                <div class="form-group pl-1 pr-0 mb-0">
                    <a href="edit_profil/tambah_akun" class="btn btn-primary pb-1 pt-1">TAMBAH AKUN <i class="fas fa-plus-circle"></i></a>
                </div>
            </div>
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Edit Profil
                </div>
                <div class="card-body">
                    @include('partial.error')
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1" for="username">Username</label>
                            <input class="form-control py-3" id="username" type="text" name="name" value="{{ $user->name }}"required />
                            <div id="error">{{ $errors->first('name') }}</div>
                        </div>
    	                <div class="form-group">
    	                    <label class="mb-1" for="email">Email</label>
    	                    <input class="form-control py-3" id="email" type="email" name="email" value="{{ $user->email }}" required/>
                            <div id="error">{{ $errors->first('email') }}</div>
    	                </div>
    	                <div class="form-group">
    	                    <label class="mb-1" for="password">Password <span style="font-style: italic;">(Boleh kosong)</span></label>
    	                    <input class="form-control py-3" id="password" type="password" name="password" placeholder="Isikan jika ingin mengganti password saja" />
                            <div id="error">{{ $errors->first('password') }}</div>
    	                </div>
                        <center>
        	                <div class="form-group mt-4 mb-0">
        	                    <button class="btn btn-success" value="submit">Simpan</button>
        	                </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection