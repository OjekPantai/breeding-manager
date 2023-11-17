<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendapatan extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'jumlah', 'harga', 'catatan'];
    protected $table = 'pendapatan'; // Mengubah nama dari 'pengeluarans' menjadi 'pengeluaran'
    public $timestamps = false; // timestamps tidak digunakan
}
