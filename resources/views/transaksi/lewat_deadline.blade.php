@extends('partial.auth')

@section('title','Peminjaman Buku')

@section('content')
    <main>
        <div class="container-fluid">
            <center>
                <div class="alert alert-danger">
                    <h4>Lewat Batas Waktu Peminjaman</h4>
                </div>
            </center>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="6%">Id</th>
                                    <th width="6%">NIS</th>
                                    <th width="12%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="10%">Kategori</th>
                                    <th width="9%">Tgl Pinjam</th>
                                    <th width="10%">Batas Waktu</th>
                                    <th width="8%">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lewat as $l)
                                    <tr>
                                        <td>{{ $l->id }}</td>
                                        <td>{{ $l-> anggota-> nis }}</td>
                                        <td>{{ $l-> anggota-> nama }}</td>
                                        <td>{{ $l-> buku-> judul }}</td>
                                        <td>{{ $l-> buku-> kategori-> nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($l->tgl_pinjam)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($l->deadline)->format('d-m-Y') }}</td>
                                        <td>
                                            @if($l->deadline < $today)
                                            <a href="{{ url('peminjaman/kembali' . $l->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="kembali">
                                                <i class="fa-2x fas fa-check-square kembali lewat"></i>
                                            </a>
                                            @else
                                            <a href="{{ url('peminjaman/kembali' . $l->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="kembali">
                                                <i class="fa-2x fas fa-check-square kembali belum"></i>
                                            </a>
                                            @endif
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
        $(document).on('click', '#kembali', function(e){
                e.preventDefault();
                var link = $(this).attr('href');
                
                Swal.fire({
                    title: 'Akan Melakukan Pengembalian?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#43A047',
                    cancelButtonColor: '#546E7A',
                    cancelButtonText: 'Tidak',
                    confirmButtonText: 'Ya',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = link;
                    }
                })
            })
    </script>
@endsection