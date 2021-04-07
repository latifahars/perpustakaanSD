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
            <div class="card mb-2 p-2 pb-3">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="pl-0 mr-4 pr-1">
                            Pilih identitas anggota dengan klik kotak pada kolom "Pilih" di bawah ini!<br> Kemudian klik :
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mt-2" name="search" placeholder="Cari Anggota" required id="search">
                    </div>
                </div>
            </div>
            @include('partial.error')
            @include('partial.alert')
                <div class="table-responsive">
                <form action="/data_anggota/cetak_kartu" method="post" name="cettakk">
                     @csrf
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
                                
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success pl-2 pr-2 pb-1 pt-1" id="tombolCetak">
                    CETAK <i class="fas fa-print"></i>
                </button>
                </form>
        </div>
    </main>
    <script>
        $(document).ready(function(){

         fetch_customer_data();

         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('cari') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            console.log(data.table_data);
            $('tbody').html(data.table_data);
           }
          })
         }

         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
    </script>
@endsection