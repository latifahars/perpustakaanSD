@extends('partial.auth')

@section('title','Struktur Organisasi')

@section('content')
    <main>
        <center> @include('partial.error')</center>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-sitemap mr-2"></i>
                    Struktur Organisasi
                </div>
                <center>
                    <div class="card-body body-struktur">
                        <table class="table table-borderless" style="width: 450px;margin-top: 25px;margin-left: -117px; text-align: center;">
                            <thead>
                                <tr>
                                    <th style="padding-left: 45px">{{$kepsek->nama}}</th>
                                    <th width="10%">
                                        <a style="cursor:pointer" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $kepsek->id }}"
                                            data-nama="{{ $kepsek->nama }}"
                                            data-jabatan="{{ $kepsek->jabatan }}">
                                            <i class="fas fa-edit" style="font-size: 20px"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless" style="width: 730px;margin-top: 73px;margin-left: 234px; text-align: center;">
                            <thead>
                                <tr>
                                    <th width="45%" style="padding-left: 45px">{{$keppus->nama}}</th>
                                    <th width="6%">
                                        <a style="cursor:pointer" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $keppus->id }}"
                                            data-nama="{{ $keppus->nama }}"
                                            data-jabatan="{{ $keppus->jabatan }}">
                                            <i class="fas fa-edit" style="font-size: 20px"></i>
                                        </a>
                                    </th>
                                    <th width="6%"></th>
                                    <th width="" style="padding-left: 45px">{{$tu->nama}}</th>
                                    <th width="6%">
                                        <a style="cursor:pointer" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $tu->id }}"
                                            data-nama="{{ $tu->nama }}"
                                            data-jabatan="{{ $tu->jabatan }}">
                                            <i class="fas fa-edit" style="font-size: 20px"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-borderless" style="width: 827px;margin-top: 120px;margin-left: -100px; text-align: center;">
                            <thead>
                                <tr>
                                    <th width="31%" style="padding-left: 45px">{{$bpt->nama}}</th>
                                    <th width="6%">
                                        <a style="cursor:pointer" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $bpt->id }}"
                                            data-nama="{{ $bpt->nama }}"
                                            data-jabatan="{{ $bpt->jabatan }}">
                                            <i class="fas fa-edit" style="font-size: 20px"></i>
                                        </a>
                                    </th>
                                    <th width="24%"></th>
                                    <th width="" style="padding-left: 45px">{{$bpp->nama}}</th>
                                    <th width="5%">
                                        <a style="cursor:pointer" id="edit_item" 
                                            data-toggle="modal" 
                                            data-target="#edit-modal"
                                            data-id="{{ $bpp->id }}"
                                            data-nama="{{ $bpp->nama }}"
                                            data-jabatan="{{ $bpp->jabatan }}">
                                            <i class="fas fa-edit" style="font-size: 20px"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </center>
            </div>
        </div>
    </main>
    <div class="modal fade" id="edit-modal">
        <div id="modal-edit" class="modal-dialog modal-dialog-centered" role="document">
        <div id="modal-content" class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT NAMA</h5>
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
                            <label class="mb-1" for="nama">Nama</label>
                                <input class="form-control py-3" id="nama" name="nama" type="text" value="" />
                                <div id="error">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="jabatan">Jabatan</label>
                            <input class="form-control py-3" id="jabatan" name="jabatan" type="text" value="" />
                            <div id="error">{{ $errors->first('jabatan') }}</div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
            let nama = $(this).data('nama');
            let jabatan = $(this).data('jabatan');
            let id = $(this).data('id');

            $('#jabatan').val(jabatan);
            
            if (jabatan) {
                $("#jabatan").attr("readonly", true);
            }else{
               
            }
            $('#nama').val(nama);

            $('#edit_form').attr('action', '/struktur_org/edit/' + id);
      })
    </script>
@endsection