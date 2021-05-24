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
                                <td width="15%"><label for="nama">Nama</label></td>
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
                                    <select id="kategori" name="kategori" class="form-control py-3 bk-c mb-0">
                                            <option selected disabled value="">--- Pilih Kategori ---</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->id }} - {{ $k->nama }}</option>
                                        @endforeach
                                    </select>
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
                                   <select id="asal" class="form-control py-3 bk-c mb-0" name="asal">
                                        <option selected disabled value="">--- Pilih Asal Perolehan ---</option>
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
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
         $('#asal').select2();
         $('#kategori').select2();
     });
    </script>
@endsection