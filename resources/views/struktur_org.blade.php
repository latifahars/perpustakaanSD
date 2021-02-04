@extends('partial.auth')

@section('title','Struktur Organisasi')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-sitemap"></i>
                    Struktur Organisasi
                    <a href="" class="btn btn-success" style="float: right;padding: 5px;padding-top: 2px;padding-bottom: 2px">Edit</a>
                </div>
                <center>
                    <div class="card-body">
                        @include('partial.error')
                        <img src="{{ asset('Struktur Organisasi2.png') }}" style="width: 950px;">
                    </div>
                </center>
            </div>
        </div>
    </main>

@endsection