@extends('layouts.app')
@section('title', 'Daftar Pemeriksaan Baru')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Form Pemeriksaan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pasien.periksa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih Dokter</label>
                    <select name="id_dokter" class="form-control" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal & Jam Pemeriksaan</label>
                    <input type="datetime-local" name="tgl_periksa" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
</div>
@endsection
