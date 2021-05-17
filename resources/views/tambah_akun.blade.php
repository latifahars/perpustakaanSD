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
                    <form method="post" action="">
                         <a href="{{ url('edit_profil') }}"><i class="fas fa-chevron-circle-left mt-2 mr-3"></i></a>
                         Daftar Akun
                        @csrf
                        <table style="float: right;">
                            <tr>
                                <td>
                                    <input class="form-control" id="username" type="text" name="username" placeholder="Masukkan Username" value="{{ old('username') }}" autofocus />
                                </td>
                                <td>                                 
                                    <input class="form-control" id="email" type="text" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"/>
                                </td>
                                <td>                                    
                                    <input class="form-control" type="password" id="password" type="text" name="password" placeholder="Masukkan Password" value="{{ old('password') }}"/>
                                </td>
                                <td>
                                    <button class="btn btn-success pb-1 pt-1" type="submit">Simpan</a></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-body">                   
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
            </div>
        </div>
    </main>

@endsection