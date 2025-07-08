@extends('layouts.app')

@section('content')
    <h2>Halo Dosen {{ auth()->user()->name }}</h2>
    <p>Ini adalah dashboard dosen. Nanti di sini bisa buat tugas dan lihat tugas mahasiswa.</p>
@endsection
