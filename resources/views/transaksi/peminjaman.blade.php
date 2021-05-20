@extends('partial.auth')

@section('title','Peminjaman Buku')

@section('content')
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="">Transaksi</a></li>
                <li class="breadcrumb-item">Peminjaman Buku</li>
            </ol>
            <div class="card mb-2 p-2">
                <div class="row">
                    <div class="form-group col-sm-4 mb-0">
                        <a href="peminjaman/tambah_peminjaman" class="btn btn-primary pb-1 pt-1 ml-2">TAMBAH PEMINJAMAN <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="col-sm-8" >
                        <a href="" class="btn btn-success pb-1 pt-1 mr-2"
                            style="cursor:pointer; float: right;"
                            id="edit_item" 
                            data-toggle="modal" 
                            data-target="#cetak-modal">
                            CETAK LAPORAN <i class="fas fa-print"></i>
                        </a>
                    </div>
                </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <table class="table table-bordered table-buku table-striped" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="0%" style="display: none;">No</th>
                                	<th width="5%">Id</th>
                                    <th width="6%">NIS</th>
                                    <th width="13%">Nama</th>
                                    <th width="20%">Judul Buku</th>
                                    <th width="10%">Kategori</th>
                                    <th width="10%">Tgl Pinjam</th>
                                    <th width="11%">Batas Waktu</th>
                                    <th width="8%">Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peminjaman as $p)
                                    <tr>
                                        <td style="display: none;">{{ $loop->iteration }}</td>
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
    <div class="modal fade" id="cetak-modal">
        <div id="modal-edit" class="modal-dialog modal-dialog-centered" role="document">
        <div id="modal-content" class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CETAK LAPORAN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="wrapper" style="margin: 0">
                    <div class="form">
                        <form id="edit_form" action="" method="POST">
                            @csrf
                        <div class="form-group">
                            <label class="mb-1" for="nama">Dari Bulan: </label>
                            <select name="bulan_awal" style="width: 100%;height: 40px;">
                                <option value="">--- Pilih Bulan ---</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="nama">Sampai  Bulan: </label>
                            <select name="bulan_akhir" style="width: 100%;height: 40px;">
                                <option value="">--- Pilih Bulan ---</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="nama">Tahun:</label>
                            <select name="tahun" style="width: 100%;height: 40px;">
                                @foreach($tahun as $t)
                                    <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="status">Status: </label>
                            <select name="status" style="width: 100%;height: 40px;">
                                <option selected="" value="semua">Semua</option>
                                <option value="kembali">Sudah Dikembalikan</option>
                                <option value="belum_kembali">Belum Dikembalikan</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">CETAK</button>
                        </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <script>
      $(document).on('click','#edit_item',function(){

            $('#edit_form').attr('action', '/peminjaman/cetak_laporan');
      })
    </script>
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