<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Tampilan Kartu Anggota</title>
    <style type="text/css">
        body{           
            display: flex;
            flex-wrap: wrap;   
            /* width: 21cm;
            height: 29.7cm; */
            margin-left: -25px;
            margin-right: -30px;
        }
        .kotak{
            display: block;
            /* background-color: aqua; */
            margin: 10px 10px 10px 5px;
            border: 3px solid black;
            width: 90mm;
            height: 55mm;
        }
        .judul{
            margin-top: 5px;
            margin-bottom: 0;
        }
        .sdn{
            margin-top: 0;
            padding-top: 0;
            margin-bottom: 0;
        }
        hr{
            border: solid black;
        }
        table{
            padding-left: 10px;
        }
        td{
            vertical-align: top;
        }
        .foto{
            border: 2px solid black;
            width: 2cm;
            height: 3cm;
            float: right;
            text-align: center;
        }
        .foto p{
            margin-top: 40px;
        }
        .Ketentuan td{
            font-size: 13px;
        }
    </style>

</head>
<body>
    <table>
        <tr>
            <td></td>
            <td></td>
        </tr>
        @foreach($data as $key => $d)
        @if ($key % 2 == 0)
        <tr>
        @endif
            <td>
                <div class="kotak">
                    <center>
                        <h3 class="judul">Kartu Anggota Perpustakaan</h3>
                        <h3 class="sdn">SDN Tayuban</h3>
                    </center>
                    <hr>
                    <table>
                        <tr>
                            <td width="50px">NIS</td>
                            <td>:</td>
                            <td width="170px">{{ $d->nis }}</td>
                            <td rowspan="5" width="80px">
                                <div class="foto">
                                    <p>2 x 3</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td height="50px">{{ $d->nama }}</td>
                        </tr>  
                        <tr class="Ketentuan">
                            <td>Ketentuan</td>
                            <td>:</td>
                        </tr> 
                        <tr class="Ketentuan">
                            <td colspan="3">1. Harus mematuhi Tata Tertib Perpustakaan.</td>
                        </tr>   
                        <tr class="Ketentuan">
                            <td colspan="3">2. Peminjaman maksimal 3 buku (5 hari).</td>
                        </tr>                       
                    </table>
                </div>
            </td>
            
        @if ($key % 2 != 0)
        </tr>
        @endif
        @endforeach
    </table>

</body>
</html>
