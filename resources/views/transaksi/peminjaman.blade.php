@extends('partial.auth')

@section('title','Peminjaman Buku')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Peminjaman Buku</li>
            </ol>
            
            <div class="form-group mb-2">
                <a href="peminjaman/tambah_peminjaman" class="btn btn-primary pb-1 pt-1">TAMBAH PEMINJAMAN <i class="fas fa-plus-circle"></i></a>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-buku" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="10%">Id Transaksi</th>
                                    <th width="6%">NIS</th>
                                    <th width="13%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="13%">Kategori</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="8%">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjaman as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p-> anggota-> nis }}</td>
                                        <td>{{ $p-> anggota-> nama }}</td>
                                        <td>{{ $p-> buku-> judul }}</td>
                                        <td>{{ $p-> buku-> kategori-> nama }}</td>
                                        <td>{{ $p-> tgl_pinjam }}</td>
                                        <td>
                                            <a href="{{ url('peminjaman/kembali' . $p->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="kembali">
                                                <i class="fa-2x fas fa-check-square kembali {{ $p->getStatus() ? 'lewat' : 'belum' }}"></i>
                                            </a>
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