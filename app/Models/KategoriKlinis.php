<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKlinis extends Model
{
    protected $table = "kategori_klinis";
    protected $primaryKey = 'idkategori_klinis';
    public $timestamps = false;
    protected $fillable = ['idkategori_klinis', 'nama_kategori_klinis']; //yang mau ditampilin or di apdet

    public function kodeTindakan(){
        return $this->hasMany(kodeTindakanTerapi::class, 'idkategori_klinis', 'idkategori_klinis');
    }
}
