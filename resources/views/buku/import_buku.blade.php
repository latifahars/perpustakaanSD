@extends('partial.auth')

@section('title','Import Buku')

@section('content')
    <main>
        <div class="container-fluid">
            @include('partial.error')
            <div class="card mb-1 pb-0">
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Import Data Buku
                </div>
                <div class="card-body pt-3 pb-1">
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
                           <li>Semua kolom harus diisi (tidak boleh kosong).</li>
                           <li>Kode Kategori, Kode Pengarang, Kode Penerbit, dan Kode Asal dapat dilihat pada halaman masing-masing halaman pada web.</li>
                           <li>Untuk Buku dengan Pengarang lebih dari 1, bisa memasukkan kode pengarang lebih dari 1 dengan dipisah tanda titik (.), contoh: 1.3.6</li>
                           <li>Format "Tanggal Dipinjam" harus DD/MM/YYYY, contoh: 09/03/2021.</li>
                           <li>Klik Choose File, pilih file yang telah disiapkan kemudian klik Import.</li>
                        </ol>
                        <h6>Contoh penulisan pada excel (Perhatikan Baris Judul!)</h6>
                        <img src="{{asset('Contoh Import Buku.JPG')}}">
                        <h6 style="margin-top: 30px;color: red">Perhatikan cara menghapus baris pada excel!</h6>
                        <ol type="1" style="padding-left: 40px">
                            Apabila ingin menghapus baris,s klik pada nomor baris pada bagian paling kiri (akan terpilih 1 baris), kemudian tekan "delete".
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection