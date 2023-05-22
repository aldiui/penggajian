@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Karyawan</div>
            <div class="ibox-tools">

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>NIK</label><br>
                <input type="text" name="nik" value="{{ $karyawan->nik }}"
                    class="form-control @error('nik') is-invalid @enderror" id="">
                @error('nik')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Nama Karyawan</label><br>
                <input type="text" name="nama" value="{{ $karyawan->nama }}"
                    class="form-control @error('nama') is-invalid @enderror" id="">
                @error('nama')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Jabatan</label><br>
                <select class="form-control @error('jabatan_id') is-invalid @enderror" name="jabatan_id">
                    <option value="" selected>--Pilih Jabatan--</option>
                    @foreach($jabatan as $j)
                    <option value="{{ $j->id }}" {{ $karyawan->jabatan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nm_jabatan }} </option>
                    @endforeach
                </select>
                @error('jabatan_id')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Tempat Tanggal Lahir</label><br>
                <input type="date" name="ttl" value="{{ $karyawan->ttl }}"
                    class="form-control @error('ttl') is-invalid @enderror" id="">
                @error('ttl')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" value="Laki-Laki"
                    {{ $karyawan->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}> Laki-Laki <br>
                <input type="radio" name="jenis_kelamin" value="Perempuan"
                    {{ $karyawan->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}> Perempuan
                @error('jenis_kelamin')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>No HP</label><br>
                <input type="text" name="no_hp" value="{{ $karyawan->no_hp }}"
                    class="form-control @error('no_hp') is-invalid @enderror" id="">
                @error('no_hp')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Alamat</label><br>
                <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                    id="">{{ $karyawan->alamat }}</textarea>
                @error('alamat')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <button class="btn btn-info" type="submit">Simpan</button>
                <a href="{{ route('karyawan.index') }}"><button class="btn btn-default" type="button">Batal</button></a>
            </form>
        </div>
    </div>
</div>
@endsection