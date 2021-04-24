@if(session('sukses'))
    <div class="alert alert-success mb-1">
        {{ session('sukses') }}
    </div>
@endif
@if(session('hapus'))
    <div class="alert alert-danger mb-1">
        {{ session('hapus') }}
    </div>
@endif
@if (session('error'))
     <div class="alert alert-danger mb-1">
	     {{ session('error') }}
	 </div>
 @endif
@if(session('pinjam'))
    <div class="alert alert-success mb-1">
        {{ session('pinjam') }}
    </div>
@endif