<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $primaryKey = 'nomorkartu';
    protected $table = 'antriansoal';

    protected $fillable = ['statusdipanggil'];
}
