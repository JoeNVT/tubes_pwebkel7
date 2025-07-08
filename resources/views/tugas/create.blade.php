@extends('layouts.app')

@section('content')
    <h3>Buat Tugas Baru</h3>
    <form action="{{ route('tugas.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
g
i
t
