@extends('partial.auth')

@section('title','Data Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Anggota</li>
            </ol>
            @include('partial.error')
             <div class="card mb-4 p-2">
                <div class="row row-peminjaman">
                    <div class="col-sm-9" style="padding-left: 0">
                        <a href="data_anggota/import_anggota" class="btn btn-import pb-1 pt-1">
                            IMPORT ANGGOTA <i class="fas fa-file-upload"></i>
                        </a>
                    </div>
                    <div class="form-group form-cari">
                        <input class="form-control" id="username" type="text" placeholder="Cari"/>
                    </div>
                </div>
                <div class="row row-peminjaman">
                    <a href="" class="btn btn-success pb-1 pt-1">CETAK KARTU <i class="fas fa-print"></i></a>
                </div>    
            </div>
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Data Anggota
                    <div class="form-group" style="float: right;margin-bottom: 0;">
		                <a href="data_anggota/tambah_anggota" class="btn btn-primary pb-1 pt-1">TAMBAH BARU <i class="fas fa-plus-circle"></i></a>
		            </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th width="13%">NIS</th>
                                    <th width="25%">Nama</th>
                                    <th width="10%">Kelas</th>
                                    <th width="8%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->nis }}</td>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->kelas }}</td>
                                    <td>
                                    	<a href="{{ url('data_anggota/edit_anggota/' . $a->id) }}"><i class="fas fa-edit" style="margin-right: 20px;margin-left: 15px"></i></a>
                                    	<a href="{{ url('data_anggota/hapus_anggota/' . $a->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="pesan"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Yakin Akan Menghapus Data Anggota ini?");
 
         if(tanya === true) {
            return true;
         }else{
            return false;
         }
 
         document.getElementById("pesan");
      }
    </script>
@endsection