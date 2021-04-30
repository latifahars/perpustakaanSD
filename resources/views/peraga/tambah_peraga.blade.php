@extends('partial.auth')

@section('title','Tambah Alat Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_peraga"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Tambah Alat Peraga
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <table class="table-tambah" style="width: 100%">
                            <tr>
                                <td width="15%"><label for="kode">Kode</label></td>
                                <td>
                                    <div class="form-group mb-1">
                                        <input class="form-control py-3" id="kode" type="text" name="kode" placeholder="Masukkan Kode" value="{{ old('kode') }}" autofocus/>
                                    <div id="error">{{ $errors->first('kode') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="nama">Nama</label></td>
                                <td>
                                    <div class="form-group mb-1">
                                        <input class="form-control py-3" id="nama" type="text" name="nama" placeholder="Masukkan Nama Alat" value="{{ old('nama') }}"/>
                                    <div id="error">{{ $errors->first('nama') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kategori">Kategori</label></td>
                                <td>
                                    <div class="form-group mb-1">
                                        <select name="kategori" style="width: 100%;height: 35px;">
                                                <option selected disabled value="">--- Pilih Kategori ---</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div id="error">{{ $errors->first('kategori') }} </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="jumlah">Jumlah</label></td>
                                <td>
                                     <div class="form-group mb-1">
                                        <input class="form-control py-3" id="jumlah" type="text" name="jumlah" placeholder="Masukkan Jumlah" value="{{ old('jumlah') }}"/>
                                    <div id="error">{{ $errors->first('jumlah') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="asal">Asal Perolehan</label></td>
                                <td>
                                   <div class="form-group mb-1">
                                        <input class="form-control py-3" id="asal" type="text" name="sumber" placeholder="Masukkan Asal Perolehan" value="{{ old('sumber') }}"/>
                                    <div id="error">{{ $errors->first('sumber') }} </div> 
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="date">Tanggal Diterima</label></td>
                                <td>
                                    <input
                                    class="form-control"
                                    style= "width: 300px"
                                    id="date"
                                    type="date"
                                    name="tgl_diterima"
                                    value=""
                                    />
                                    <div id="error">{{ $errors->first('tgl_diterima') }} </div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-4 mb-0">
                            <a class="btn btn-danger" style="float: left;" href="/data_peraga">Batal</a>
                            <button class="btn btn-success" style="float: right;" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
    </main>

@endsection