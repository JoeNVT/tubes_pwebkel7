@extends('layouts.app')

@section('content')
    <h3>Daftar Tugas untuk Dikumpulkan</h3>

    <table class="table table-bordered bg-white text-dark">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deadline</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugas as $t)
                <tr>
                    <td>{{ $t->judul }}</td>
                    <td>{{ $t->deadline }}</td>
                    <td>
                        <a href="{{ route('pengumpulan.create', $t->id) }}" class="btn btn-primary btn-sm">Kumpulkan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
