@extends('layouts.app')
@section('title', 'Riwayat Pemeriksaan')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Riwayat Pemeriksaan</h5>
        </div>
        <div class="card-body">
            @if($riwayat->count())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>Catatan</th>
                                <th>Obat</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_periksa)->format('d M Y H:i') }}</td>
                                <td>{{ $item->dokter->nama }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>
                                    @foreach($item->obats as $obat)
                                        <span class="badge bg-info">{{ $obat->nama_obat }}</span>
                                    @endforeach
                                </td>
                                <td>Rp {{ number_format($item->biaya_periksa) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">Belum ada riwayat pemeriksaan.</div>
            @endif
        </div>
    </div>
</div>
@endsection
