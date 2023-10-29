<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenisbarang_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'barang_id', 'id');
    }
}
