@extends('partial.auth')

@section('title','Tambah Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/peminjaman"><i class="fas fa-chevron-circle-left"></i></a>
                    Tambah Peminjaman Buku
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="mb-1" for="nis">NIS</label>
                        <input class="form-control py-3" id="nis" type="text" placeholder="Masukkan NIS" autofocus />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="nama">Nama</label>
                        <input class="form-control py-3" id="nama" type="text" placeholder="Masukkan Nama" autofocus />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="kode">Kode Buku</label>
                        <input class="form-control py-3" id="kode" type="text" placeholder="Masukkan Kode Buku" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input
                            class="form-control report"
                            id="date"
                            type="date"
                            name="date"
                            value=""
                        />
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