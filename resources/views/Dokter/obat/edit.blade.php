@extends('layouts.app')
@section('title', 'Edit Obat')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Obat</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dokter.obat.update', $obat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kemasan</label>
                    <input type="text" name="kemasan" class="form-control" value="{{ $obat->kemasan }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $obat->harga }}" required>
                </div>

                <button class="btn btn-primary">Update Obat</button>
            </form>
        </div>
    </div>
</div>
@endsection
