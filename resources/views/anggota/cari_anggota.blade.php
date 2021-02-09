@extends('partial.auth')

@section('title','Data Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            @include('partial.error')
            @if ($anggota->isEmpty())
                <div class="pl-0 pr-0">
                    <div class="alert alert-danger mt-2 pb-1 pt-2">
                       <center><h5>Hasil Pencarian Tidak Ditemukan!</h5></center>
                    </div>
                    <a class="btn btn-success pt-1 pb-1" href="/data_anggota">Kembali</a>
                </div>
            @else
                <div class="alert alert-success mt-2 pb-1 pt-2">
                   <center><h5>Hasil Pencarian Ditemukan!</h5></center>
                </div>
                <a class="btn btn-success pt-1 pb-1 mb-1" href="/data_anggota">Kembali</a>
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
            @endif
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