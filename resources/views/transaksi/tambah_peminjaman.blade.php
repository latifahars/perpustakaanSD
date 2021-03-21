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
                                    <option value="{{ $b->kode }}">{{ $b->kode }} - {{ $b->judul }}</option>
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