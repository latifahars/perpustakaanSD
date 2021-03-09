@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid" style="padding-top: 0px">
            <div class="card mb-4" >
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Tambah Buku Perpustakaan
                </div>
                <div class="card-body pb-1 pt-1">
                    <form method="post" action="">
                        @csrf
                        <table class="table-tambahbuku">
                            <tr>
                                <td><label for="kode">Kode</label></td>
                                <td width="100%">
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="kode" type="text" name="kode" placeholder="Masukkan Kode Buku" value="{{ old('kode') }}" autofocus />
                                    </div>
                                    <div id="error">{{ $errors->first('kode') }} </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="judul">Judul</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="judul" type="text" name="judul" placeholder="Masukkan Judul Buku" value="{{ old('judul') }}" />
                                    </div>
                                    <div id="error">{{ $errors->first('judul') }} </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kategori">Kategori</label></td>
                                <td>
                                    <div class="form-group bk-c">
                                        <select name="kategori" style="width: 100%;height: 40px;">
                                                <option value="">--- Pilih Kategori ---</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="error">{{ $errors->first('kategori') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="penerbit">Penerbit</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="penerbit" type="text" name="penerbit" placeholder="Masukkan Penerbit" value="{{ old('penerbit') }}"/>
                                    </div>
                                    <div id="error">{{ $errors->first('penerbit') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kota">Kota</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="penerbit" type="text" name="kota" placeholder="Masukkan Kota Penerbit" value="{{ old('kota') }}"/>
                                    </div> 
                                    <div id="error">{{ $errors->first('kota') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="halaman">Halaman</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="halaman" type="text" name="halaman" placeholder="Masukkan Jumlah Halaman" value="{{ old('halaman') }}"/>
                                    </div>
                                    <div id="error">{{ $errors->first('halaman') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="eksemplar">Jumlah</label></td>
                                <td>
                                   <div class="form-group">
                                        <input class="form-control bk-c" id="eksemplar" type="text" name="jumlah" placeholder="Masukkan Jumlah Buku" value="{{ old('eksemplar') }}"/>
                                    </div> 
                                    <div id="error">{{ $errors->first('jumlah') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="asal">Asal</label></td>
                                <td>
                                   <div class="form-group">
                                        <input class="form-control bk-c" id="asal" type="text" name="asal" placeholder="Masukkan Asal Perolehan" value="{{ old('sumber') }}"/>
                                    </div>
                                    <div id="error">{{ $errors->first('asal') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="date">Tgl Terima</label></td>
                                <td>
                                    <input
                                    class="form-control bk-c"
                                    id="date"
                                    type="date"
                                    name="tanggal_diterima"
                                    value="{{ old('tgl_diterima') }}"
                                    />
                                    <div id="error">{{ $errors->first('tanggal_diterima') }}</div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-3">
                            <a class="btn btn-danger pb-1 pt-1" style="float: left;" href="/data_buku">Batal</a>
                            <button class="btn btn-success pb-1 pt-1" style="float: right;" type="submit">Simpan</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </main>
@endsection