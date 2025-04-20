@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Profil Saya</h4>
    <table class="table">
        <tr><th>Nama</th><td>{{ Auth::user()->nama }}</td></tr>
        <tr><th>Email</th><td>{{ Auth::user()->email }}</td></tr>
        <tr><th>No HP</th><td>{{ Auth::user()->no_hp }}</td></tr>
        <tr><th>Alamat</th><td>{{ Auth::user()->alamat }}</td></tr>
    </table>
</div>
@endsection
