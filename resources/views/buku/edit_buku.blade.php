@extends('partial.auth')

@section('title','Data Buku')

@section('content')
    <main>
        <div class="container-fluid" style="padding-top: 0px">
            <div class="card mb-4" >
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left"></i></a>
                    Edit Buku
                </div>
                <div class="card-body pb-1 pt-1">
                    @include('partial.error')
                    <form method="post" action="">
                        @csrf
                        <table class="table-tambahbuku">
                            <tr>
                                <td><label for="kode">Kode</label></td>
                                <td width="100%">
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="kode" type="text" name="kode" value="{{ $buku->kode }}" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="judul">Judul</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="judul" type="text" name="judul" value="{{ $buku->judul }}" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kategori">Kategori</label></td>
                                <td>
                                    <div class="form-group">
                                        <select name="kategori" style="width: 100%;height: 40px;">
                                            @foreach ($kategori as $k)
                                                @if ($k->idkategori == $buku->idkategori)
                                                    <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
                                                @else
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><label for="penerbit">Penerbit</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="penerbit" name="penerbit" type="text" value="{{ $buku->penerbit->nama }}"/>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kota">Kota</label></td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control bk-c" id="penerbit" type="text" name="kota" value="{{ $buku->penerbit->kota }}"/>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><label for="halaman">Halaman</label></td>
                                <td>
                                     <div class="form-group">
                                        <input class="form-control bk-c" id="halaman" type="text" name="halaman" value="{{ $buku->halaman }}"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="eksemplar">Eksemplar</label></td>
                                <td>
                                   <div class="form-group">
                                        <input class="form-control bk-c" id="eksemplar" type="text" name="eksemplar" value="{{ $buku->eksemplar }}"/>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><label for="asal">Asal</label></td>
                                <td>
                                   <div class="form-group">
                                        <input class="form-control bk-c" id="asal" type="text" name="sumber" value="{{ $buku->sumber->nama }}"/>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><label for="date">Tgl Terima</label></td>
                                <td>
                                    <input
                                    class="form-control bk-c"
                                    id="date"
                                    type="date"
                                    name="tgl_diterima"
                                    value="{{ $buku->tgl_diterima }}"
                                    />
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-3">
                            <a class="btn btn-danger pb-1 pt-1" style="float: left;" href="">Batal</a>
                            <button class="btn btn-success pb-1 pt-1" style="float: right;" href="" type="submit">Simpan</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </main>
@endsection