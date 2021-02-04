@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid" style="padding-top: 0px">
            <div class="card mb-4" >
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left"></i></a>
                    Tambah Buku Perpustakaan
                </div>
                <div class="card-body pb-1 pt-1">
                    @include('partial.error')
                    <table class="table-tambahbuku">
                        <tr>
                            <td><label for="kode">Kode</label></td>
                            <td width="100%">
                                <div class="form-group">
                                    <input class="form-control bk-c" id="kode" type="text" placeholder="Masukkan Kode Buku" autofocus />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="judul">Judul</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control bk-c" id="judul" type="text" placeholder="Masukkan Judul Buku" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kategori">Kategori</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control bk-c" id="kategori" type="text" placeholder="Masukkan Kategori" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="penerbit">Penerbit</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control bk-c" id="penerbit" type="text" placeholder="Masukkan Penerbit" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kota">Kota</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control bk-c" id="penerbit" type="text" placeholder="Masukkan Kota Penerbit" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="halaman">Halaman</label></td>
                            <td>
                                 <div class="form-group">
                                    <input class="form-control bk-c" id="halaman" type="text" placeholder="Masukkan Jumlah Halaman" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="eksemplar">Eksemplar</label></td>
                            <td>
                               <div class="form-group">
                                    <input class="form-control bk-c" id="eksemplar" type="text" placeholder="Masukkan Eksemplar" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="asal">Asal</label></td>
                            <td>
                               <div class="form-group">
                                    <input class="form-control bk-c" id="asal" type="text" placeholder="Masukkan Asal Perolehan" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="deskripsi">Deskripsi</label></td>
                            <td>
                               <div class="form-group">
                                    <textarea class="form-control bk-c" rows="2" id="deskripsi" placeholder="Masukkan Deskripsi Sumber"></textarea>
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
                                name="date"
                                value=""
                                />
                            </td>
                        </tr>
                    </table>
                    <div class="form-group mt-3">
                        <a class="btn btn-danger pb-1 pt-1" style="float: left;" href="">Batal</a>
                        <a class="btn btn-success pb-1 pt-1" style="float: right;" href="" type="submit">Simpan</a>
                    </div>
                </div> 
            </div>
        </div>
    </main>
@endsection