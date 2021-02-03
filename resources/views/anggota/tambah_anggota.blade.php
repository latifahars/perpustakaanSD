@extends('partial.auth')

@section('title','Data Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_anggota"><i class="fas fa-chevron-circle-left"></i></a>
                    Tambah Anggota Perpustakaan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="mb-1" for="nis">NIS</label>
                        <input class="form-control py-3" id="nis" type="text" placeholder="Masukkan NIS" autofocus />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="nama">Nama</label>
                        <input class="form-control py-3" id="nama" type="text" placeholder="Masukkan Nama" />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="kelas">Kelas</label>
                        <input class="form-control py-3" id="kelas" type="text" placeholder="Masukkan Kelas" />
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <a class="btn btn-danger" style="float: left;" href="/data_anggota">Batal</a>
                        <a class="btn btn-success" style="float: right;" href="">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection