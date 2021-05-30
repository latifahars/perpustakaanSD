@extends('partial.auth')

@section('title','Tambah Peminjaman')

@section('content')
    <main>
        <div class="container-fluid">
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/peminjaman"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Tambah Peminjaman Buku
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1" for="nis">Masukkan Anggota</label> 
                            <select id="anggota" class="form-control py-3" name="nis">
                                <option value="">--- Pilih Anggota ---</option>
                                @foreach ($anggota as $a)
                                    <option value="{{ $a->nis }}">{{ $a->nis }} - {{ $a->nama }}</option>
                                @endforeach
                            </select>
                            <div id="error">{{ $errors->first('nis') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="kode">Masukkan Buku</label> 
                            <select id="buku" class="form-control" name="kode">
                                <option value="">--- Pilih Buku ---</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b->kode }}" data-judul="{{ $b->judul }}">{{ $b->kode }} | {{ $b->judul }}</option>
                                @endforeach
                            </select>
                            <div id="error">{{ $errors->first('kode') }}</div>
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <a class="btn btn-danger" style="float: left;" href="/peminjaman">Batal</a>
                            <button class="btn btn-success" style="float: right;" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>               
            </div>
            @if(!empty($nis) || !empty($kode) || !empty($nama)|| !empty($judul))
                <div class="alert alert-success mb-1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4><i class="far fa-check-circle"></i> SUKSES</h4>
                    <table>
                        <tr>
                            <td>Id Peminjaman</td>
                            <td>:</td>
                            <td>{{$id}}</td>
                        </tr>
                        <tr>
                            <td width="120px">Kode Buku</td>
                            <td>:</td>
                            <td>{{$kode}}</td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td>{{$judul}}</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{$nis}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$nama}}</td>
                        </tr>
                    </table>
                </div>
            @endif     
        </div>
    </main>
     <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
         $('#anggota').select2();
         $('#buku').select2();
     });
    </script>
@endsection