<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treatment extends Model
{
    use HasFactory;
    protected $fillable = ['batch', 'jenis_vaksinvitamin', 'umur', 'jml_ayam', 'tanggal'];
    protected $table = 'treatment'; // Mengubah nama dari 'pengeluarans' menjadi 'pengeluaran'
    public $timestamps = false; // timestamps tidak digunakan
}
