@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Absensi</div>
            <div class="ibox-tools">
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nama Karyawan</label><br>
                <select class="form-control @error('karyawan') is-invalid @enderror" name="karyawan_id">
                    <option value="" selected>--Nama Karyawan--</option>
                    @foreach($karyawan as $k)
                    <option value="{{ $k->id }}" {{ $k->id == $absensi->karyawan_id ? 'selected' : '' }}> {{ $k->nama }}
                    </option>
                    @endforeach
                </select>
                <p></p>

                <label>Bulan</label><br>
                <select class="form-control @error('bulan') is-invalid @enderror" name="bulan">
                    <option value="" selected>--Pilih Bulan--</option>
                    @foreach($bulan as $b)
                    <option value="{{ $b['no'] }}" {{ $b['no'] == $absensi->bulan ? 'selected' : '' }}> {{ $b['nama'] }}
                    </option>
                    @endforeach
                </select>
                @error('bulan')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Tahun</label><br>
                <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                    <option value="" selected>--Pilih Tahun--</option>
                    @foreach($tahun as $t)
                    <option value="{{ $t }}" {{ $t == $absensi->tahun ? 'selected' : '' }}> {{ $t }} </option>
                    @endforeach
                </select>
                @error('tahun')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Hadir</label><br>
                <input type="number" name="hadir" value="{{ $absensi->hadir }}"
                    class="form-control @error('hadir') is-invalid @enderror" id="">
                @error('hadir')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Tidak Hadir</label><br>
                <input type="number" name="tidak_hadir" value="{{ $absensi->tidak_hadir }}"
                    class="form-control @error('tidak_hadir') is-invalid @enderror" id="">
                @error('tidak_hadir')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Izin</label><br>
                <input type="number" name="izin" value="{{ $absensi->izin }}"
                    class="form-control @error('izin') is-invalid @enderror" id="">
                @error('izin')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <label>Lembur (Jam)</label><br>
                <input type="number" name="lembur" value="{{ $absensi->lembur }}"
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