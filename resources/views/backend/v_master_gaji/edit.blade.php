@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Master Gaji</div>
            <div class="ibox-tools">
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{ route('master_gaji.update', $masterGaji->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Total Absensi</label><br>
                <select class="form-control @error('absensi') is-invalid @enderror" name="absensi_id" id="absensi_id">
                    <option value="" selected>--Total Absensi--</option>
                    @foreach($absensi as $absen)
                    <option value="{{ $absen->id }}" data-tidakhadir="{{ $absen->tidak_hadir }}"
                        data-izin="{{ $absen->izin }}" data-lembur="{{ $absen->lembur }}"
                        data-jabatan="{{ $absen->karyawan->jabatan->tunjangan_jabatan }}"
                        data-pokok="{{ $absen->karyawan->jabatan->gaji_pokok }}"
                        {{ $absen->id == $masterGaji->absensi_id ? 'selected' : '' }}>
                        {{ $absen->karyawan->nama }} -
                        @getNamaBulan($absen->bulan) {{$absen->tahun}}
                    </option>
                    @endforeach
                </select>
                <p></p>
                <div id="rincian_gaji"></div>
                <p></p>

                <label>Total Gaji</label><br>
                <input type="text" name="total_gaji" value="{{ $masterGaji->total_gaji }}" id="total_gaji"
                    class="form-control @error('total_gaji') is-invalid @enderror" readonly>
                @error('total_gaji')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <button class="btn btn-info" type="submit">Simpan</button>
                <a href="{{ route('master_gaji.index') }}"><button class="btn btn-default"
                        type="button">Batal</button></a>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('absensi_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var tidakhadir = parseFloat(selectedOption.getAttribute('data-tidakhadir'));
    var izin = parseFloat(selectedOption.getAttribute('data-izin'));
    var lembur = parseFloat(selectedOption.getAttribute('data-lembur'));
    var tunjangan = parseFloat(selectedOption.getAttribute('data-jabatan'));
    var pokok = parseFloat(selectedOption.getAttribute('data-pokok'));

    var rincianGaji = "Rincian Gaji:<br>";
    rincianGaji += "Gaji Pokok: Rp " + pokok + "<br>";
    rincianGaji += "Tunjangan Jabatan: Rp " + tunjangan + "<br>";
    rincianGaji += "Lembur: " + lembur + " jam x Rp 10,000<br>";
    rincianGaji += "Tidak Hadir: " + tidakhadir + " hari x Rp 20,000<br>";
    rincianGaji += "Izin: " + izin + " hari x Rp 20,000<br>";

    var totalGaji = tunjangan + pokok - (tidakhadir * 20000) - (izin * 20000) + (lembur * 10000);

    document.getElementById('rincian_gaji').innerHTML = rincianGaji;
    document.getElementById('total_gaji').value = totalGaji;
});
</script>
@endsection