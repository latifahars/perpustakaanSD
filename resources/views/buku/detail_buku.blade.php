@extends('partial.auth')

@section('title','Data Buku')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="/data_buku"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                    Detail Buku
                </div>
                <div class="card-body" style="padding: 0 0 0 20px">
                    <table class="table table-borderless table-detailbuku">
                        <tr class="pb-0">
                            <td width="15%" style="padding: 10px 0 0 20px">Kode</td>
                            <td width="2%" style="padding: 10px 0 0 20px">:</td>
                            <td width="70%" style="padding: 10px 0 0 20px">
                                {{$buku-> kode}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Judul</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> judul}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Kategori</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> kategori-> nama}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Penerbit</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> penerbit-> nama}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Kota Terbit</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> penerbit-> kota}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Pengarang</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            
                            <td style="padding: 5px 0 2px 20px">
                                @foreach ($buku->pengarang as $pengarang)
                                    {{$pengarang-> nama}} <br> 
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Halaman / Page</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> halaman}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Jumlah / Eksemplar</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> eksemplar}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Asal Perolehan</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{$buku-> sumber-> nama}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Tanggal Diterima</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{ \Carbon\Carbon::parse($buku->tgl_diterima)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Tanggal Input</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{ \Carbon\Carbon::parse($buku->create_at)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0 2px 20px">Petugas Input/ Edit</td>
                            <td style="padding: 5px 0 2px 20px">:</td>
                            <td style="padding: 5px 0 2px 20px">{{ $buku->user->name }}</td>
                        </tr>
                    </table>
                </div> 
            </div>
        </div>
    </main>
@endsection