@extends('layouts.app')

@section('content')
    <h3>Edit Tugas</h3>
    <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-2">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $tugas->judul }}" required>
        </div>
        <div class="mb-2">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $tugas->deskripsi }}</textarea>
        </div>
        <div class="mb-2">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" value="{{ $tugas->deadline }}" required>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
