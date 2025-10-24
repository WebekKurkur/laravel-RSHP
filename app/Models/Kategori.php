<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $primaryKey = 'idkategori';
    public $timestamps = false;
    protected $fillable = ['idkategori', 'nama_kategori']; //yang mau ditampilin or di apdet

    public function kodeTindakan(){
        return $this->hasMany(kodeTindakanTerapi::class, 'idkategori', 'idkategori');
    }
}
