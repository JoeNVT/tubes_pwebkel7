<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengumpulanTugas;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class PengumpulanTugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::latest()->get();
        return view('pengumpulan.index', compact('tugas'));
    }

    public function create($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('pengumpulan.create', compact('tugas'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,doc|max:2048',
            'komentar' => 'nullable|string'
        ]);

        $path = $request->file('file')->store('tugas_uploads');

        PengumpulanTugas::create([
            'tugas_id' => $id,
            'mahasiswa_id' => Auth::id(),
            'file' => $path,
            'komentar' => $request->komentar
        ]);

        return redirect()->route('pengumpulan.index')->with('success', 'Tugas berhasil dikumpulkan');
    }

    public function lihatKumpulan($id)
    {
        $tugas = Tugas::findOrFail($id);
        $pengumpulan = $tugas->pengumpulan()->with('mahasiswa')->get();
        return view('pengumpulan.lihat', compact('tugas', 'pengumpulan'));
    }
}
