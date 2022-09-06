<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulangan extends Model
{
    use HasFactory;
    protected $table = 'ulangan';
    protected $fillable = [
        'jadwal_id',
        'judul',
        'type',
        'file_or_link',
        'description',
        'pengumpulan',
        'tanggal',
        'pertemuan'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
