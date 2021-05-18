@extends('partial.auth')

@section('title','Edit Alat Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_peraga"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Edit Alat Peraga
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <table class="table-tambahperaga" style="width: 100%">
                            <tr>
                                <td width="15%"><label for="kode">Kode</label></td>
                                <td>
                                    <div class="form-group mb-1">
                                        <input class="form-control py-3" id="kode" name="kode" type="text" value="{{ $peraga->kode }}">
                                    <div id="error">{{ $errors->first('kode') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="nama">Nama</label></td>
                                <td>
                                    <div class="form-group mb-1" >
                                        <input class="form-control py-3" id="nama" name="nama" type="text" value="{{ $peraga->nama }}"/>
                                    <div id="error">{{ $errors->first('nama') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kategori">Kategori</label></td>
                                <td>
                                    <div class="form-group mb-1">
                                        <select id="kategori" name="kategori" style="width: 100%;height: 35px;">
                                            @foreach ($kategori as $k)
                                                @if ($k->idkategori == $peraga->idkategori)
                                                    <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
                                                @else
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                @endif
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
                                        <input class="form-control py-3" id="jumlah" name="jumlah" type="text" value="{{ $peraga->jumlah }}" />
                                        <div id="error">{{ $errors->first('jumlah') }} </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="asal">Asal Perolehan</label></td>
                                <td>
                                   <div class="form-group mb-1">
                                        <select id="asal" name="asal" style="width: 100%;height: 35px;">
                                        @foreach ($asal as $a)
                                            <option value="{{ $a->id }}">{{ $a->id }} - {{ $a->nama }}</option>
                                        @endforeach
                                        </select>
                                        <div id="error">{{ $errors->first('asal') }} </div>
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
                                    value="{{ $peraga->tgl_diterima }}"
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
        $(document).ready(function () {
            var nama = {!!json_encode($nama)!!};
            var namas = {!!json_encode($namas)!!};

            console.log(nama);
            let kategori = $(this).data('kategori');
            $('#kategori option').filter(function(){
                return ($(this).val() == nama)
                }).prop('selected', true);
            $('#asal option').filter(function(){
                return ($(this).val() == namas)
                }).prop('selected', true);
        })
        $(document).ready(function() {
         $('#penerbit').select2();
         $('#kategori').select2();
         $('#asal').select2();
         $('#pengarang').select2();
     });
    </script>
@endsection