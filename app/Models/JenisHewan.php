<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
    protected $table = "jenis_hewan";
    protected $primaryKey = 'idjenis_hewan';
    public $timestamps = false;
    protected $fillable = ['idjenis_hewan', 'nama_jenis_hewan']; //yang mau ditampilin or di apdet

    public function rasHewan(){
        return $this->hasMany(RasHewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }
};
