@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Karyawan</div>
            <div class="ibox-tools">
                
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="/karyawan" method="POST">
                @csrf

                <label>NIK</label><br>
                <input type="text" name="nik" value="{{old('nik')}}" class="form-control @error('nik') is-invalid @enderror" id="">
                @error('nik')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Nama Karyawan</label><br>
                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="">
                @error('nama')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Jabatan</label><br>
                <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan_id">
                    <option value="" selected>--Pilih Jabatan--</option>
                    @foreach($jabatan as $k)
                    <option value="{{ $k->id }}"> {{ $k->nm_jabatan }} </option>
                    @endforeach
                </select>
                <p></p>

                <label>Tempat Tanggal Lahir</label><br>
                <input type="date" name="ttl" value="{{old('ttl')}}" class="form-control @error('ttl') is-invalid @enderror" id="">
                @error('ttl')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Jenis Kelamin</label><br>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki <br>

                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </td>
                @error('jenis_kelamin')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>No HP</label><br>
                <input type="text" name="no_hp" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror" id="">
                @error('no_hp')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Alamat</label><br>
                <textarea type="text" name="alamat" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror" id=""></textarea>
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