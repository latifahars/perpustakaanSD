@extends('partial.auth')

@section('title','Tambah Buku')

@section('content')
	<main>
        <div class="container-fluid" style="padding-top: 0px">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Tambah Buku Perpustakaan
                </div>
                <div class="card-body pb-1 pt-1">
                    <form method="post" action="">
                        @csrf
                        <table class="table-tambahbuku mt-2" style="width: 100%">
                            <tr>
                                <td width="15%"><label for="kode">Nomor Rak</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="nomor_rak" type="text" name="nomor_rak" placeholder="Masukkan Nomor Rak Buku" value="{{ old('nomor_rak') }}" autofocus />
                                    <div id="error">{{ $errors->first('nomor_rak') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="judul">Judul</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="judul" type="text" name="judul" placeholder="Masukkan Judul Buku" value="{{ old('judul') }}" />
                                    <div id="error">{{ $errors->first('judul') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kategori">Kategori</label></td>
                                <td>
                                    <div class="form-group bk-c mb-0">
                                        <select id="kategori" name="kategori" style="width: 100%;height: 35px;">
                                                <option selected disabled value="{{ old('kategori') }}">--- Pilih Kategori ---</option>
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
                                    <select id="penerbit" class="form-control py-3 bk-c mb-0" name="penerbit">
                                        <option selected disabled value="{{ old('penerbit') }}">--- Pilih Penerbit ---</option>
                                        @foreach ($penerbit as $p)
                                            <option value="{{ $p->id }}">{{ $p->id }} - {{ $p->nama }} - {{ $p->kota }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error">{{ $errors->first('penerbit') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pengarang">Pengarang</label></td>
                                <td>
                                    <select id="pengarang" name="pengarang[]" multiple class="form-control py-3 bk-c mb-0">
                                        <option disabled value="">--- Pengarang bisa lebih dari 1 ---</option>
                                        @foreach ($pengarang as $p)
                                            <option value="{{ $p->id }}">{{ $p->id }} - {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                    <!-- <select id="pengarang" class="form-control py-3 bk-c mb-0" name="pengarang">
                                        <option selected disabled value="{{ old('pengarang') }}">--- Pilih Pengarang ---</option>
                                        @foreach ($pengarang as $p)
                                            <option value="{{ $p->id }}">{{ $p->id }} - {{ $p->nama }}</option>
                                        @endforeach
                                    </select> -->
                                    <div id="error">{{ $errors->first('pengarang') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="halaman">Halaman</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="halaman" type="text" name="halaman" placeholder="Masukkan Jumlah Halaman" value="{{ old('halaman') }}"/>
                                    <div id="error">{{ $errors->first('halaman') }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="eksemplar">Jumlah</label></td>
                                <td>
                                   <div class="form-group">
                                        <input class="form-control bk-c" id="eksemplar" type="text" name="jumlah" placeholder="Masukkan Jumlah Buku" value="{{ old('jumlah') }}"/>
                                    <div id="error">{{ $errors->first('jumlah') }}</div>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><label for="asal">Asal</label></td>
                                <td>
                                   <select id="asal" class="form-control py-3 bk-c mb-0" name="asal">
                                        <option selected disabled value="{{ old('asal') }}">--- Pilih Asal Perolehan ---</option>
                                        @foreach ($asal as $a)
                                            <option value="{{ $a->id }}">{{ $a->id }} - {{ $a->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error">{{ $errors->first('asal') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="date">Tanggal Diterima</label></td>
                                <td>
                                    <input
                                    class="form-control bk-c"
                                    style= "width: 300px"
                                    id="date"
                                    type="date"
                                    name="tanggal_diterima"
                                    value="{{ old('tanggal_diterima') }}"
                                    />
                                    <div id="error">{{ $errors->first('tanggal_diterima') }}</div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-2 mb-5">
                            <a class="btn btn-danger pb-1 pt-1" style="float: left;" href="/data_buku">Batal</a>
                            <button class="btn btn-success pb-1 pt-1" style="float: right;" type="submit">Simpan</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
         $('#penerbit').select2();
         $('#kategori').select2();
         $('#asal').select2();
         $('#pengarang').select2();
     });
    </script>
@endsection