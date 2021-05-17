@extends('partial.auth')

@section('title','Tambah Akun')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Profil</a></li>
                <li class="breadcrumb-item">Tambah Akun</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/edit_profil"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Tambah Akun Petugas Perpustakaan
                </div>
                <div class="card-body p-2">
                    <form method="post" action="">
                        @csrf
                        <table width="100%">
                            <tr>
                                <td width="8%" style="padding-bottom: 17px"><label class="mb-0 pt-0" for="username">Username:</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" id="username" type="text" name="username" placeholder="Masukkan Username" value="{{ old('username') }}" autofocus />
                                        <div id="error">{{ $errors->first('username') }}</div>
                                    </div>
                                </td>
                                <td width="6%" style="padding-bottom: 17px"><label class="mb-0 mr-2" for="email" style="float: right;">Email:</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"/>
                                        <div id="error">{{ $errors->first('email') }}</div>
                                    </div>
                                </td>
                                <td width="9%" style="padding-bottom: 17px"><label class="mb-0 mr-2" for="password" style="float: right;">Password:</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="password" id="password" type="text" name="password" placeholder="Masukkan Password" value="{{ old('password') }}"/>
                                        <div id="error">{{ $errors->first('password') }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <center>
                                    <div class="form-group mb-0">
                                        <button class="btn btn-success" type="submit">Simpan</a></button>
                                    </div>
                                    </center>
                                </td>
                            </tr>
                        </table>                   
                    </form>
                </div>
            </div>
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="4%">Id</th>
                                <th width="13%">Username</th>
                                <th width="25%">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <td>{{ $u->id}}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </main>

@endsection