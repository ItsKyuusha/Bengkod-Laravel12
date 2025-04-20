@extends('layouts.app')
@section('title', 'Form Pemeriksaan')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Pemeriksaan untuk: {{ $periksa->pasien->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dokter.periksa.store', $periksa->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Catatan Medis</label>
                    <textarea name="catatan" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Obat yang Diberikan</label>
                    @foreach($obats as $obat)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="obat[]" value="{{ $obat->id }}" id="obat{{ $obat->id }}">
                            <label class="form-check-label" for="obat{{ $obat->id }}">
                                {{ $obat->nama_obat }} ({{ $obat->kemasan }}) - Rp{{ number_format($obat->harga) }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Biaya Pemeriksaan</label>
                    <input type="number" name="biaya_periksa" class="form-control" value="150000" required>
                    <small class="text-muted">Rp150.000 + total harga obat</small>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
            </form>
        </div>
    </div>
</div>
@endsection
