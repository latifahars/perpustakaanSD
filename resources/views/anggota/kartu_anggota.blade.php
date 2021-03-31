<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>


    <style type="text/css">
        
    </style>

</head>
<body>
<div class="row">
    @foreach($data as $d)
        <div class="col-sm-6" style="margin-top: 10px">
            <div class="card">
                <center>
                    <h3>Kartu Anggota Perpustakaan</h3>
                    <h2>SDN Tayuban</h2>
                </center>
                <h5>{{ $d->nis }}</h5>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>