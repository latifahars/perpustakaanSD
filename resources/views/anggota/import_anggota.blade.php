@extends('partial.auth')

@section('title','Import Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            <div class="card mb-2">
                <div class="card-header">
                    <a href="/data_anggota"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Import Data Anggota
                </div>
                <div class="card-body pt-3">
                    <div class="card mb-2 p-2">
                        <div class="row row-peminjaman">
                            <div class="col-sm-6">
                                <form id="import_form" action="/data_anggota/import_anggota" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input name="file" type="file" required='required'>
                                    <button type="submit" class="btn btn-primary pb-1 pt-1 pl-2 pr-2">Import</button>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-size: 17px;color: blue">Catatan : Import dapat melakukan update nama dan kelas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 p-2">
                        <h5>Petunjuk Import:</h5>
                        <ol type="1" style="padding-left: 60px">
                            <li>Siapkan file excel dan beri baris pertama nama kolom yang akan diisi seperti gambar di bawah (Harus Terurut Sesuai Gambar!).</li>
                           <li>Semua kolom harus diisi (tidak boleh kosong) dan pastikan tidak ada yang double.</li>
                           <li>"Nama" maksimal 30 karakter dan pastikan "NIS" tidak ada yang double.</li>
                           <li>"Kelas" dapat diisikan dengan format "Kelas x", contoh: Kelas 6.</li>
                           <li>Klik Choose File, pilih file yang telah disiapkan kemudian klik Import.</li>
                        </ol>
                        <h6>Tuliskan pada baris pertama excel seperti di bawah ini:</h6>
                        <img style="width: 50%" src="{{asset('Contoh Import Anggota.JPG')}}"> <br>
                        <h6>Contoh pengisian:</h6>
                        <img style="width: 50%" src="{{asset('Contoh Import Anggota 2.JPG')}}">
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection