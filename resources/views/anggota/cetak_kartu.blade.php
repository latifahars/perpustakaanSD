@extends('partial.auth')

@section('title','Cetak Kartu Anggota')

@section('content')
	<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-3">
                <a href="/data_anggota"><i class="fas fa-chevron-circle-left mr-3"></i></a>
                <li class="breadcrumb-item"><a href="">Cetak Kartu</a></li>
                <li class="breadcrumb-item">Pilih Identitas Anggota</li>
            </ol>
            <div class="card mb-2 p-2">
                <div class="pl-0 mr-4 pr-1" style="text-align: right">
                    Pilih identitas anggota yang ingin dicetak di bawah ini, kemudian klik :
                    <a href="" class="btn btn-success pb-1 pt-1 pl-2 pr-2">CETAK <i class="fas fa-print"></i></a>
                </div> 
            </div>
            @include('partial.error')
            @include('partial.alert')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="" style="width: 995px;margin-left: 10px">
                        @csrf
                            <table class="table table-bordered table-striped" id="datatable" width="100%" cellspacing="0">
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
                                    @foreach ($anggota as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->nis }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->kelas }}</td>
                                        <td>{{ \Carbon\Carbon::parse($a->updated_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <center>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="nis" id="flexCheckDefault" name="cetak">
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection