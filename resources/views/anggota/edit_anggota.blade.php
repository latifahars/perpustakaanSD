@extends('partial.auth')

@section('title','Data Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_anggota"><i class="fas fa-chevron-circle-left"></i></a>
                    Edit Anggota Perpustakaan
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1" for="nis">NIS</label>
                            <input class="form-control py-3" id="nis" type="text" name="nis" value="{{ $anggota->nis }}" autofocus />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="nama">Nama</label>
                            <input class="form-control py-3" id="nama" type="text" name="nama" value="{{ $anggota->nama }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="kelas">Kelas</label><br>
                            <select name="kelas" style="width: 100%;height: 40px;">
                                <option value="{{ $anggota->kelas }}">{{ $anggota->kelas }}</option>
                                <option value="Kelas 1">Kelas 1</option>
                                <option value="Kelas 2">Kelas 2</option>
                                <option value="Kelas 3">Kelas 3</option>
                                <option value="Kelas 4">Kelas 4</option>
                                <option value="Kelas 5">Kelas 5</option>
                                <option value="Kelas 6">Kelas 6</option>
                            </select>
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <a class="btn btn-danger" style="float: left;" href="/data_anggota">Batal</a>
                            <button class="btn btn-success" style="float: right;" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection