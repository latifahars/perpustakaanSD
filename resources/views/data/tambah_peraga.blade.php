@extends('partial.auth')

@section('title','Tambah Alat Peraga')

@section('content')
	<main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_peraga"><i class="fas fa-chevron-circle-left"></i></a>
                    Tambah Alat Peraga
                </div>
                <div class="card-body">
                    <table class="table-tambah">
                        <tr>
                            <td><label for="kode">Kode</label></td>
                            <td width="100%">
                                <div class="form-group">
                                    <input class="form-control py-3" id="kode" type="text" placeholder="Masukkan Kode" autofocus />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="nama">Nama</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="nama" type="text" placeholder="Masukkan Nama Alat" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kategori">Kategori</label></td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control py-3" id="kategori" type="text" placeholder="Masukkan Kategori" />
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="jumlah">Jumlah</label></td>
                            <td>
                                 <div class="form-group">
                                    <input class="form-control py-3" id="jumlah" type="text" placeholder="Masukkan Jumlah" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sumber">Sumber</label></td>
                            <td>
                               <div class="form-group">
                                    <input class="form-control py-3" id="sumber" type="text" placeholder="Masukkan Sumber" />
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
                        <a class="btn btn-danger" style="float: left;" href="/data_anggota">Batal</a>
                        <a class="btn btn-success" style="float: right;" href="">Simpan</a>
                    </div>
                </div>   
            </div>
        </div>
    </main>
@endsection