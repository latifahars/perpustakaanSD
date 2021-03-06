@extends('partial.auth')

@section('title','Data Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Anggota</li>
            </ol>
            @include('partial.error')
            <div class="card mb-2 p-2">
                <div class="row row-peminjaman">
                    <div class="form-group mb-0 pl-1 col-sm-10">
                        <a href="data_anggota/tambah_anggota" class="btn btn-primary pb-1 pt-1">TAMBAH ANGGOTA <i class="fas fa-plus-circle"></i></a>
                        <a href="data_anggota/import_anggota" class="btn btn-import pb-1 pt-1">
                            IMPORT ANGGOTA <i class="fas fa-file-upload"></i>
                        </a>
                    </div>
                    <div class="pl-0 mr-2">
                        <a href="data_anggota/cetak_anggota" class="btn btn-success pb-1 pt-1">CETAK KARTU <i class="fas fa-print"></i></a>
                    </div>
                </div>    
            </div>
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th width="10%">NIS</th>
                                    <th width="30%">Nama</th>
                                    <th width="11%">Kelas</th>
                                    <th width="6%">Aksi</th>
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
                                    	<a href="{{ url('data_anggota/hapus_anggota/' . $a->id) }}" data-toggle="tooltip" id="hpsanggota"><i class="fas fa-trash-alt"></i></a>
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
    <script type="text/javascript">
        $(document).on('click', '#hpsanggota', function(e){
                e.preventDefault();
                var link = $(this).attr('href');
                
                Swal.fire({
                    title: 'Yakin Dihapus?',
                    text: "Jika anggota dihapus, maka peminjaman oleh anggota ini ikut terhapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#grey',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Hapus',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                })
            })
    </script>
@endsection