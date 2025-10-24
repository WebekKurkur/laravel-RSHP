<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    protected $table = "pemilik";
    protected $primaryKey = 'idpemilik';
    public $timestamps = false;
    protected $fillable = ['idpemilik', 'no_wa', 'alamat', 'iduser']; //yang mau ditampilin or di apdet

    public function user() {
        return $this->belongsTo(User::class, 'iduser','iduser');
    }
    public function pet() {
        return $this->hasMany(pet::class, 'idpemilik','idpemilik');
    }
}
