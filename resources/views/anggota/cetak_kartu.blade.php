@extends('partial.auth')

@section('title','Cetak Kartu Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <a href="/data_anggota"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                <li class="breadcrumb-item"><a href="">Cetak Kartu</a></li>
                <li class="breadcrumb-item">Identitas Anggota</li>
            </ol>
            <div class="card mb-2 p-2">
                <form action="/data_anggota/cetak_kartu" method="post" name="cettakk">
                     @csrf
                <div class="pl-0 mr-4 pr-1" style="text-align: right">
                    Pilih identitas anggota yang ingin dicetak di bawah ini, kemudian klik :
                    <button type="submit" class="btn btn-success pl-2 pr-2 pb-1 pt-1">
                        CETAK <i class="fas fa-print"></i>
                    </button>
                </div> 
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th width="6%">NIS</th>
                                    <th width="15%">Nama</th>
                                    <th width="10%">Kelas</th>
                                    <th width="8%">Tanggal Update</th>
                                    <th width="4%">Pilih</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                    @foreach ($anggota as $key=>$a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->nis }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->kelas }}</td>
                                        <td>{{ \Carbon\Carbon::parse($a->updated_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <center>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="{{$a->id}}"  name="cetak[]">
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection