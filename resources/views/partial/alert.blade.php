@if(session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
@endif
@if(session('hapus'))
    <div class="alert alert-danger">
        {{ session('hapus') }}
    </div>
@endif