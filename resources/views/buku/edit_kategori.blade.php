@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                     <a href="/data_buku/kategori"><i class="fas fa-chevron-circle-left"></i></a>Edit Kategori {{ $kategori->nama }}
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1" for="nama">Nama Kategori</label>
                            <input class="form-control py-3" id="nama" name="nama" type="text" value="{{ $kategori->nama }}" autofocus />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="deadline">Batas Peminjaman (minggu)</label>
                            <input class="form-control py-3" id="deadline" name="deadline" type="text" value="{{ $kategori->deadline }}" />
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection