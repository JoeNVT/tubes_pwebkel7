<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index() {
        $tugas = Tugas::latest()->get();
        return view('tugas.index', compact('tugas'));
    }

    public function create() {
        return view('tugas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'deadline' => 'required|date'
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'dosen_id' => Auth::id()
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat');
    }

    public function edit(Tugas $tugas) {
        return view('tugas.edit', compact('tugas'));
    }

    public function update(Request $request, Tugas $tugas) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'deadline' => 'required|date'
        ]);

        $tugas->update($request->only('judul', 'deskripsi', 'deadline'));
        return redirect()->route('tugas.index')->with('success', 'Tugas diperbarui');
    }

    public function destroy(Tugas $tugas) {
        $tugas->delete();
        return redirect()->route('tugas.index')->with('success', 'Tugas dihapus');
    }
}
