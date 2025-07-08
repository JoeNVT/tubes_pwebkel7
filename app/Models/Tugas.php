<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tugas extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'deadline', 'dosen_id'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

        public function pengumpulan()
    {
        return $this->hasMany(PengumpulanTugas::class);
    }

}
