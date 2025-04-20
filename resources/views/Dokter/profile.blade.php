@extends('layouts.app')
@section('title', 'Profil Dokter')

@section('content')
<div class="container">
    <h3>Profil Dokter</h3>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Role:</strong> Dokter</p>
        </div>
    </div>
</div>
@endsection
