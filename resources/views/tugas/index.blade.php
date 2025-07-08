@extends('layouts.app')

@section('content')
    <h3>Daftar Tugas</h3>
    @if(auth()->user()->role == 'dosen')
        <a href="{{ route('tugas.create') }}" class="btn btn-success mb-3">+ Tambah Tugas</a>
    @endif

    <table class="table table-bordered bg-white text-dark">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Deadline</th>
                @if(auth()->user()->role == 'dosen')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($tugas as $t)
                <tr>
                    <td>{{ $t->judul }}</td>
                    <td>{{ $t->deskripsi }}</td>
                    <td>{{ $t->deadline }}</td>
                    @if(auth()->user()->role == 'dosen')
                        <td>
                            <a href="{{ route('tugas.edit', $t) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tugas.destroy', $t) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                            <a href="{{ route('pengumpulan.lihat', $t->id) }}" class="btn btn-info btn-sm">Lihat Kumpulan</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
