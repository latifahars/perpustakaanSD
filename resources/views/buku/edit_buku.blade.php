@extends('partial.auth')

@section('title','Edit Buku')

@section('content')
    <main>
        <div class="container-fluid" style="padding-top: 0px">
            <div class="card mb-4" >
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Edit Buku
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <table class="table-tambahbuku" width="100%">
                            <tr>
                                <td width="15%"><label for="kode">Kode</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="kode" type="text" name="kode" value="{{ $buku->kode }}" />
                                        <div id="error">{{ $errors->first('kode') }}</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="judul">Judul</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="judul" type="text" name="judul" value="{{ $buku->judul }}" />
                                    </div>
                                    <div id="error">{{ $errors->first('judul') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kategori">Kategori</label></td>
                                <td>
                                    <div class="form-group">
                                        <select id="kategori" name="kategori" style="width: 100%;height: 35px;">
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}">{{$k->id}} - {{ $k->nama }}</option>
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
                                    <select id="penerbit" name="penerbit" style="width: 100%;height: 35px;">
                                        @foreach ($penerbit as $p)
                                            <option value="{{ $p->id }}">{{ $p->id }} - {{ $p->nama }} - {{ $p->kota }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div id="error">{{ $errors->first('penerbit') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pengarang">Pengarang</label></td>
                                <td>
                                    <div class="form-group">
                                        <select id="pengarang" name="pengarang[]" multiple style="width: 100%">
                                        <option disabled value="">--- Untuk memilih pengarang, tekan dan tahan tombol ctrl lalu klik pengarang ---</option>
                                        @foreach ($pengarang as $p)
                                            <option value="{{ $p->id }}">{{ $p->id }} - {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error">{{ $errors->first('pengarang') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="halaman">Halaman</label></td>
                                <td>
                                     <div class="form-group">
                                        <input class="form-control bk-c" id="halaman" type="text" name="halaman" value="{{ $buku->halaman }}"/>
                                    </div>
                                    <div id="error">{{ $errors->first('halaman') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="eksemplar">Jumlah</label></td>
                                <td>
                                   <div class="form-group">
                                        <input class="form-control bk-c" id="eksemplar" type="text" name="jumlah" value="{{ $buku->eksemplar }}"/>
                                    </div>
                                    <div id="error">{{ $errors->first('jumlah') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="asal">Asal</label></td>
                                <td>
                                   <div class="form-group">
                                        <select id="asal" name="asal" style="width: 100%;height: 35px;">
                                        @foreach ($asal as $a)
                                            <option value="{{ $a->id }}">{{ $a->id }} - {{ $a->nama }}</option>
                                        @endforeach
                                        </select>
                                    </div>
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
                                    value="{{ $buku->tgl_diterima }}"
                                    />
                                    <div id="error">{{ $errors->first('tanggal_diterima') }}</div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-3 mb-2">
                            <a class="btn btn-danger pb-1 pt-1" style="float: left;" href="{{url('data_buku')}}">Batal</a>
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
        $(document).ready(function () {
            var nama = {!!json_encode($nama)!!};
            var namap = {!!json_encode($namap)!!};
            var namas = {!!json_encode($namap)!!};
            var namape = {!!json_encode($namap)!!};
            console.log(namape);
            let kategori = $(this).data('kategori');
            let penerbit = $(this).data('penerbit');
            let sumber = $(this).data('sumber');
            let pengarang = $(this).data('pengarang');

            $('#kategori option').filter(function(){
                return ($(this).val() == nama)
                }).prop('selected', true);
            $('#penerbit option').filter(function(){
                return ($(this).val() == namap)
                }).prop('selected', true);
            $('#asal option').filter(function(){
                return ($(this).val() == namas)
                }).prop('selected', true);
            $('#pengarang option').filter(function(){
                return ($(this).val() == namape)
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