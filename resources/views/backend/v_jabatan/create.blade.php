@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Jabatan</div>
            <div class="ibox-tools">
                
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="/jabatan" method="POST">
                @csrf
                <label>Kode Jabatan</label><br>
                <input type="text" name="kd_jabatan" value="{{old('kd_jabatan')}}" class="form-control @error('kd_jabatan') is-invalid @enderror" id="">
                @error('kd_jabatan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Nama Jabatan</label><br>
                <input type="text" name="nm_jabatan" value="{{old('nm_jabatan')}}" class="form-control @error('nm_jabatan') is-invalid @enderror" id="">
                @error('nm_jabatan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Tunjangan Jabatan</label><br>
                <input type="text" name="tunjangan_jabatan" value="{{old('tunjangan_jabatan')}}" class="form-control @error('tunjangan_jabatan') is-invalid @enderror" id="">
                @error('tunjangan_jabatan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Gaji Pokok</label><br>
                <input type="text" name="gaji_pokok" value="{{old('gaji_pokok')}}" class="form-control @error('gaji_pokok') is-invalid @enderror" id="">
                @error('gaji_pokok')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <button class="btn btn-info" type="submit">Simpan</button>
                <a href="{{ route('jabatan.index') }}"><button class="btn btn-default" type="button">Batal</button></a>
            </form>
        </div>
    </div>
</div>
@endsection