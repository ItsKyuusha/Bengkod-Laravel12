@extends('layouts.app')
@section('title', 'Kelola Obat')

@section('content')
<div class="container">
    <h3>Daftar Obat</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('dokter.obat.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-3">
            <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="kemasan" class="form-control" placeholder="Kemasan" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>
        <div class="col-md-3">
            <button class="btn btn-success">Tambah Obat</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kemasan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
                <tr>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->kemasan }}</td>
                    <td>Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('dokter.obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus obat ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
