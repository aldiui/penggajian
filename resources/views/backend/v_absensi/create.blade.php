@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Absensi</div>
            <div class="ibox-tools">

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="/absensi" method="POST">
                @csrf

                <label>Nama Karyawan</label><br>
                <select class="form-control @error('karyawan') is-invalid @enderror" name="karyawan_id">
                    <option value="" selected>--Nama Karyawan--</option>
                    @foreach($karyawan as $k)
                    <option value="{{ $k->id }}"> {{ $k->nama }} </option>
                    @endforeach
                </select>
                <p></p>

                <label>Bulan</label><br>
                <input type="text" name="bulan" value="{{old('bulan')}}"
                    class="form-control @error('bulan') is-invalid @enderror" id="">
                @error('bulan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Hadir</label><br>
                <input type="number" name="hadir" value="{{old('hadir')}}"
                    class="form-control @error('hadir') is-invalid @enderror" id="">
                @error('hadir')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Tidak Hadir</label><br>
                <input type="number" name="tidak_hadir" value="{{old('tidak_hadir')}}"
                    class="form-control @error('tidak_hadir') is-invalid @enderror" id="">
                @error('tidak_hadir')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Izin</label><br>
                <input type="number" name="izin" value="{{old('izin')}}"
                    class="form-control @error('izin') is-invalid @enderror" id="">
                @error('izin')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Lembur (Jam)</label><br>
                <input type="number" name="izin" value="{{old('lembur')}}"
                    class="form-control @error('lembur') is-invalid @enderror" id="">
                @error('lembur')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <button class="btn btn-info" type="submit">Simpan</button>
                <a href="{{ route('absensi.index') }}"><button class="btn btn-default" type="button">Batal</button></a>
            </form>
        </div>
    </div>
</div>
@endsection