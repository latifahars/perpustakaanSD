@extends('partial.auth')

@section('title','Data Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_anggota"><i class="fas fa-chevron-circle-left"></i></a>
                    Import Data Anggota
                </div>
                <div class="card-body">
                    <div class="card mb-4 p-2">
                        Choose File<br>Upload
                        @include('partial.error')
                    </div>
                    <div class="card mb-4 p-2">
                        <h4>Petunjuk Import</h4>
                        <ol class="mb-0 mt-2">Data yang dimasukkan harus sesuai dengan petunjuk berikut:</ol>
                        <ol type="1" style="padding-left: 80px">
                           <li>Baris pertama adalah nama kolom pada tabel seperti gambar di bawah.</li>
                           <li>Semua kolom harus diisi dan tidak boleh kosong.</li>
                           <li>Simpan dalam format CSV.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection