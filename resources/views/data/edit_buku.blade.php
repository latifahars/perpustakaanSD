@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left"></i></a>
                    Edit Buku [namabuku]
                </div>
                <div class="card-body">
                    <table class="table-tambah">
                        <tr>
                            <td><label for="kode">Kode</label></td>
                            <td width="100%">
                                <div class="form-group">
                                    <input class="form-control py-3" id="kode" type="text" placeholder="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="judul">Judul</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="judul" type="text" placeholder="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kategori">Kategori</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="kategori" type="text" placeholder="" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="penerbit">Penerbit</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="penerbit" type="text" placeholder="" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kota">Kota</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="penerbit" type="text" placeholder="" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="halaman">Halaman</label></td>
                            <td>
                                 <div class="form-group">
                                    <input class="form-control py-3" id="halaman" type="text" placeholder="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="eksemplar">Eksemplar</label></td>
                            <td>
                               <div class="form-group">
                                    <input class="form-control py-3" id="eksemplar" type="text" placeholder="" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sumber">Sumber</label></td>
                            <td>
                               <div class="form-group">
                                    <input class="form-control py-3" id="sumber" type="text" placeholder="" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="deskripsi">Deskripsi</label></td>
                            <td>
                               <div class="form-group">
                                    <textarea class="form-control" rows="2" id="deskripsi" placeholder=""></textarea>
                                </div> 
                            </td>
                        </tr>

                        <tr>
                            <td><label for="date">Tanggal Diterima</label></td>
                            <td>
                                <input
                                class="form-control report"
                                id="date"
                                type="date"
                                name="date"
                                value=""
                                />
                            </td>
                        </tr>
                    </table>
                    <div class="form-group mt-4 mb-0">
                        <a class="btn btn-danger" style="float: left;" href="">Batal</a>
                        <a class="btn btn-success" style="float: right;" href="" type="submit">Simpan</a>
                    </div>
                </div> 
            </div>
        </div>
    </main>
@endsection