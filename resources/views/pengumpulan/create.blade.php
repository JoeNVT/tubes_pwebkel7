@extends('layouts.app')

@section('content')
    <h3>Upload Tugas: {{ $tugas->judul }}</h3>

    <form action="{{ route('pengumpulan.store', $tugas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="file">File Tugas (PDF/DOC)</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="komentar">Komentar</label>
            <textarea name="komentar" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Kirim Tugas</button>
    </form>
@endsection
