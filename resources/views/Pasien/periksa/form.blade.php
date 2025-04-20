@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Pemeriksaan Baru</h4>
    <form action="{{ route('pasien.periksa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Pilih Dokter</label>
            <select name="id_dokter" class="form-control" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Tanggal & Jam Pemeriksaan</label>
            <input type="datetime-local" name="tgl_periksa" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Daftar</button>
    </form>
</div>
@endsection
