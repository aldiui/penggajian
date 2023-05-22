@extends('backend.v_layouts.app')
@section('content')
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Laporan Gaji</div>
            <div class="ibox-tools">

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">option 1</a>
                    <a class="dropdown-item">option 2</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <form action="{{ route('generate-pdf') }}" method="POST">
                @csrf

                <label>Bulan</label><br>
                <select class="form-control @error('bulan') is-invalid @enderror" name="bulan">
                    <option value="" selected>--Pilih Bulan--</option>
                    @foreach($bulan as $b)
                    <option value="{{ $b['no'] }}"> {{ $b['nama'] }} </option>
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
                    <option value="{{ $t }}"> {{ $t }} </option>
                    @endforeach
                </select>
                @error('tahun')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
                <p></p>

                <button class="btn btn-info" type="submit">Generate PDF</button>
            </form>

            <!-- Tampilkan PDF di sini -->
            @if(isset($pdfUrl))
            <embed src="{{ $pdfUrl }}" type="application/pdf" width="100%" height="600px" />
            @endif
        </div>
    </div>
</div>
@endsection