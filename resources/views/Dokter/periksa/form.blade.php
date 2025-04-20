@extends('layouts.app')
@section('title', 'Form Pemeriksaan')

@section('content')
<div class="container">
    <h3>Pemeriksaan untuk: {{ $periksa->pasien->name }}</h3>

    <form action="{{ route('dokter.periksa.store', $periksa->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Catatan Medis</label>
            <textarea name="catatan" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Obat yang diberikan</label><br>
            @foreach($obats as $obat)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="obat[]" value="{{ $obat->id }}" id="obat{{ $obat->id }}">
                    <label class="form-check-label" for="obat{{ $obat->id }}">
                        {{ $obat->nama_obat }} ({{ $obat->kemasan }}) - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label>Total Biaya Pemeriksaan</label>
            <input type="number" name="biaya_periksa" class="form-control" value="150000" required>
            <small class="text-muted">Rp150.000 + harga obat</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
    </form>
</div>
@endsection
