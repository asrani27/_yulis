<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{

    protected $table = 'inventaris';
    protected $guarded = ['id'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
