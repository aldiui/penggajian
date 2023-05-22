@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        <div class="col-md-9">
            <div class="card shadow-3 rounded-3">
                <div class="card-header text-center bg-teal bg-opacity-75 text-white">
                    <h5 class="mb-0 font-weight-bold">
                        Halaman Beranda
                    </h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <div class="text-center">
                            <div>Selamat Datang Dihalaman Administrator {{ Auth::user()->name }}</div>
                            <div>Website Projek Kelompok Analisa Perancangan Sistem Informasi Akuntansi Kelas 11.4A.35
                            </div>
                            <div>Sistem Penggajian Serba Sambal</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection