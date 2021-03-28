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
                        <table class="table table-bordered table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                	<th width="5%">Id</th>
                                    <th width="6%">NIS</th>
                                    <th width="12%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="10%">Kategori</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="10%">Batas Waktu</th>
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
                                        <td>{{ \Carbon\Carbon::parse($p->tgl_pinjam)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->deadline)->format('d-m-Y') }}</td>
                                        <td>
                                            @if($p->deadline < $today)
                                            <a href="{{ url('peminjaman/kembali' . $p->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="kembali">
                                                <i class="fa-2x fas fa-check-square kembali lewat"></i>
                                            </a>
                                            @else
                                            <a href="{{ url('peminjaman/kembali' . $p->id) }}" data-toggle="tooltip" onclick="return konfirmasi()" id="kembali">
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
                    title: 'Yakin akan dimasukkan riwayat?',
                    text: "Data akan dipindah ke riwayat peminjaman!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    cancelButtonColor: 'grey',
                    cancelButtonText: 'Batal',
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