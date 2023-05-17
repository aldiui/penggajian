@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Akun</div>
            <div class="ibox-tools">
                
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="/akun" method="POST">
                @csrf
                <label>Kode Akun</label><br>
                <input type="text" name="kd_akun" value="{{old('kd_akun')}}" class="form-control @error('kd_akun') is-invalid @enderror" id="">
                @error('kd_akun')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Nama Akun</label><br>
                <input type="text" name="nama_akun" value="{{old('nama_akun')}}" class="form-control @error('nama_akun') is-invalid @enderror" id="">
                @error('nama_akun')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>
                <button class="btn btn-info" type="submit">Simpan</button>
                <a href="{{ route('akun.index') }}"><button class="btn btn-default" type="button">Batal</button></a>
            </form>
        </div>
    </div>
</div>
@endsection