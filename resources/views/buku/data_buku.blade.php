@extends('partial.auth')

@section('title','Data Buku')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Data</a></li>
                <li class="breadcrumb-item">Data Buku</li>
            </ol>
            <div class="card mb-2 p-2">
            	<div class="row row-peminjaman pr-2">
                    <div class="form-group col-sm-8 mb-0 pl-1 pr-0">
                        <a href="data_buku/tambah_buku" class="btn btn-primary pb-1 pt-1">TAMBAH BUKU <i class="fas fa-plus-circle"></i></a>
                        <a href="data_buku/import_buku" class="btn btn-import pb-1 pt-1">
                            IMPORT BUKU <i class="fas fa-file-upload"></i>
                        </a>
                        <a href="data_buku/kategori" class="btn btn-tambahbuku pb-1 pt-1" type="submit" >
                            KATEGORI BUKU <i class="fas fa-layer-group"></i>
                        </a>
                    </div>
            		<div class="pl-0 col-sm-4" style="text-align: right;">
                        
                        <a href="data_buku/pengarang" class="btn btn-pengarang pb-1 pt-1" type="submit">
                            PENGARANG
                        </a>
                        <a href="data_buku/penerbit" class="btn btn-penerbit pb-1 pt-1" type="submit">
                            PENERBIT
                        </a>
                        <a href="data_buku/asal_perolehan" class="btn btn-asal pb-1 pt-1" type="submit">
                            ASAL
                        </a>
					</div>
	            </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div >
                        <table class="table table-bordered table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="0%" style="display: none;">No</th>
                                	<th width="8%">Kode</th>
                                    <th width="25%">Judul Buku</th>
                                    <th width="13%">Kategori</th>
                                    <th width="13%">Penerbit</th>
                                    <th width="8%">Page</th>
                                    <th width="8%">Jumlah</th>
                                    <th width="9%">Asal</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $b)
                                <tr>
                                    <td style="display: none;">{{ $loop->iteration }}</td>
                                    <td>{{ $b-> kode }}</td>
                                    <td>{{ $b-> judul }}</td>
                                    <td>{{ $b-> kategori-> nama }}</td>
                                    <td>{{ $b-> penerbit-> nama }}</td>
                                    <td>{{ $b-> halaman }}</td>
                                    <td>{{ $b-> eksemplar }}</td>
                                    <td>{{ $b-> sumber-> nama }}</td>
                                    <td class="aksi-buku">
                                        <a href="{{ url('data_buku/detail_buku/' . $b->id) }}"><i class="fas fa-eye"></i></a>
                                    	<a href="{{ url('data_buku/edit_buku/' . $b->id) }}"><i class="fas fa-edit"></i></a>
                                    	<a href="{{ url('data_buku/hapus_buku/' . $b->id) }}" data-toggle="tooltip"  id="hpsbuku"><i class="fas fa-trash-alt"></i></a>
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
        $(document).on('click', '#hpsbuku', function(e){
                e.preventDefault();
                var link = $(this).attr('href');
                
                Swal.fire({
                    title: 'Yakin Dihapus?',
                    text: "Jika buku dihapus, maka peminjaman dengan buku ini ikut terhapus!",
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