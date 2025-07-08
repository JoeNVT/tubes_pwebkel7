@extends('layouts.app')

@section('content')
    <h2>Halo Mahasiswa {{ auth()->user()->name }}</h2>
    <p>Ini adalah dashboard mahasiswa. Nanti di sini bisa lihat tugas dan upload tugas.</p>
@endsection
