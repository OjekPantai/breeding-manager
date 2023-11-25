<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitoring extends Model
{
    use HasFactory;
    protected $fillable = ['batch', 'jenis_pejantan', 'jenis_betina', 'jml_hidup', 'jml_mati'];
    protected $table = 'monitoring';
}
