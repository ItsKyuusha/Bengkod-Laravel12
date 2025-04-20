@extends('layouts.app')
@section('title', 'Profil Pasien')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Profil Saya</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th width="200">Nama</th><td>{{ Auth::user()->nama }}</td></tr>
                <tr><th>Email</th><td>{{ Auth::user()->email }}</td></tr>
                <tr><th>No HP</th><td>{{ Auth::user()->no_hp }}</td></tr>
                <tr><th>Alamat</th><td>{{ Auth::user()->alamat }}</td></tr>
            </table>
        </div>
    </div>
</div>
@endsection
