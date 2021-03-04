@extends('partial.auth')

@section('title','Data Buku')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-2"></i></a>
                    Detail Buku {{$buku-> judul}}
                </div>
                <div class="card-body" style="padding: 0 0 0 20px">
                    <table class="table table-borderless table-detailbuku">
                        <tr>
                            <td width="20%">Kode</td>
                            <td width="5%">:</td>
                            <td width="100%">
                                {{$buku-> kode}}
                            </td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td>{{$buku-> judul}}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>{{$buku-> kategori-> nama}}</td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td>{{$buku-> penerbit-> nama}}</td>
                        </tr>
                        <tr>
                            <td>Kota Terbit</td>
                            <td>:</td>
                            <td>{{$buku-> penerbit-> kota}}</td>
                        </tr>
                        <tr>
                            <td>Halaman / Page</td>
                            <td>:</td>
                            <td>{{$buku-> halaman}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah / Eksemplar</td>
                            <td>:</td>
                            <td>{{$buku-> eksemplar}}</td>
                        </tr>
                        <tr>
                            <td>Asal Perolehan</td>
                            <td>:</td>
                            <td>{{$buku-> sumber-> nama}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Diterima</td>
                            <td>:</td>
                            <td>{{$buku-> tgl_diterima}}</td>
                        </tr>
                    </table>
                </div> 
            </div>
        </div>
    </main>
@endsection