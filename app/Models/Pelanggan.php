<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'tb_pelanggan';
    protected $fillable = [
        'id_pelanggan',
        'nama',
        'alamat',
        'tarif',
        'daya',
        'gardu'
    ];
}
