<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{

    protected $table = 'mutasi';
    protected $guarded = ['id'];
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
    public function dari()
    {
        return $this->belongsTo(Ruangan::class, 'dari_ruangan_id');
    }
    public function ke()
    {
        return $this->belongsTo(Ruangan::class, 'ke_ruangan_id');
    }
}
