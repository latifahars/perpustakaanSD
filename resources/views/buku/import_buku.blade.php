@extends('partial.auth')

@section('title','Data Buku')

@section('content')
    <main>
        <div class="container-fluid">
            @include('partial.error')
            <div class="card mb-1">
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Import Data Buku
                </div>
                <div class="card-body pt-3">
                    <div class="card mb-2 p-2">
                        <form id="import_form" action="/data_buku/import_buku" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="file" type="file" required='required'>
                            <button type="submit" class="btn btn-primary pb-1 pt-1 pl-2 pr-2">Import</button>
                        </form>
                    </div>
                    <div class="card mb-2 p-2">
                        <h5>Petunjuk Import:</h5>
                        <ol type="1" style="padding-left: 60px">
                            <li>Siapkan file excel dan beri baris pertama nama kolom yang akan diisi seperti gambar di bawah (Harus Terurut Sesuai Gambar!).</li>
                           <li>Semua kolom harus diisi (tidak boleh kosong) dan pastikan "Kode Buku" tidak ada yang double.</li>
                           <li>"Kode Kategori" dapat dilihat pada halaman Kategori Buku.</li>
                           <li>Format "Tanggal Dipinjam" harus DD/MM/YYYY, contoh: 09/03/2021.</li>
                           <li>Klik Choose File, pilih file yang telah disiapkan kemudian klik Import.</li>
                        </ol>
                        <h6>Tuliskan pada baris pertama excel seperti di bawah ini:</h6>
                        <img src="{{asset('Contoh Import Buku.JPG')}}"> <br>
                        <h6>Contoh pengisian:</h6>
                        <img src="{{asset('Contoh Import Buku 2.JPG')}}">
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection