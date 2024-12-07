<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'email',
        'jurusan',
        'dosen_id'
    ];

    public $timestamps = false;

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
