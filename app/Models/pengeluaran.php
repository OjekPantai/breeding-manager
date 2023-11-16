<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'harga_pakan', 'catatan'];
    protected $table = 'pengeluaran'; // Mengubah nama dari 'pengeluarans' menjadi 'pengeluaran'
    public $timestamps = false; // timestamps tidak digunakan
}
