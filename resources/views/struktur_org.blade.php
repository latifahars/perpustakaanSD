@extends('partial.auth')
<link href="orgchart/orgchart.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="orgchart/orgchart.js"></script>

@section('title','Struktur Organisasi')

@section('menu')
<div class="sidebar">
	<div class="keterangan">Dashboard</div>
	<a href="/dashboard"><span><i class="fas fa-desktop"></i>Dashboard</span></a>
	<div class="keterangan">Transaksi</div>
	<a href="/peminjaman"><span><i class="fas fa-file-signature"></i>Peminjaman Buku</span></a>
	<a href="/pengembalian"><span><i class="fas fa-history"></i>Pengembalian Buku</span></a>
	<div class="keterangan">Data</div>
	<a href="/data_buku"><span><i class="fas fa-book"></i>  Data Buku</span></a>
	<a href="/data_anggota"><span><i class="fas fa-users"></i>Data Anggota</span></a>
	<a href="/data_peraga"><span><i class="fas fa-shapes"></i>  Data Alat Peraga</span></a>
	<a href=""class="active"><span><i class="fas fa-sitemap"></i>Struktur Organisasi</span></a>
	<div class="keterangan">Profil</div>
	<a href="/edit_profil"><span><i class="fas fa-user-edit"></i>Edit Profil</span></a>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <ul id="tree-data" style="display:none">
            <li id="root">
                Direktorat Utama
                <ul>
                    <li id="node1">
                       Direktorat Operasi
                    </li>
                    <li id="node2">
                       Direktorat Investasi
                    </li>
                    <li id="node3">
                       Direktorat Umum
                    </li>
                    <li id="node4">
                       Direktorat Keuangan
                    </li>
                    <li id="node5">
                       Direktorat Informasi
                    </li>
                </ul>
            </li>
        </ul>
    <div id="tree-view"></div>  
    
	    <script>
	        $(document).ready(function () {
	        // create a tree
	        $("#tree-data").jOrgChart({
	            chartElement: $("#tree-view"), 
	            nodeClicked: nodeClicked
	        });
	        // lighting a node in the selection
	        function nodeClicked(node, type) {
	            node = node || $(this);
	            $('.jOrgChart .selected').removeClass('selected');
	                node.addClass('selected');
	            }
	        });
	    </script>       
    </div>
</div>

@endsection