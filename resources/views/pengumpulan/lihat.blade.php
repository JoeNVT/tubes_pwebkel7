@extends('layouts.app')

@section('content')
    <h3>Pengumpulan Tugas: {{ $tugas->judul }}</h3>

    <table class="table table-bordered bg-white text-dark">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>File</th>
                <th>Komentar</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengumpulan as $data)
                <tr>
                    <td>{{ $data->mahasiswa->name }}</td>
                    <td><a href="{{ asset('storage/' . $data->file) }}" target="_blank">Lihat File</a></td>
                    <td>{{ $data->komentar }}</td>
                    <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada mahasiswa yang mengumpulkan tugas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
