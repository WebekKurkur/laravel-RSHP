<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RasHewan extends Model
{
    protected $table = "ras_hewan";
    protected $primaryKey = 'idras_hewan';
    public $timestamps = false;
    protected $fillable = ['idras_hewan', 'nama_ras_hewan', 'idjenis_hewan']; //yang mau ditampilin or di apdet

    public function jenisHewan(){
        return $this->belongsTo(JenisHewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }

    public function pets() {
        return $this->hasMany(pet::class, 'idras_hewan', 'idras_hewan');
    }
}
