<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran_admin extends Model
{
    use HasFactory;
    protected $fillable = ['harga', 'jenis', 'catatan', 'mitra'];
    protected $table = 'pengeluaran_admin'; // Mengubah nama dari 'pengeluarans' menjadi 'pengeluaran'
    public $timestamps = false; // timestamps tidak digunakan
}
