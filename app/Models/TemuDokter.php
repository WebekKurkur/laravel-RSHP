<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    use HasFactory;

    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'idpet',
        'idrole_user',
        'waktu_daftar',
        'no_urut',
        'status',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function roleUser()
    {
        return $this->belongsTo(RoleUser::class, 'idrole_user', 'idrole_user');
    }

    public function getDokterAttribute()
    {
        return $this->roleUser ? $this->roleUser->user : null;
    }

    public function getNomorUrutAttribute()
    {
        return $this->no_urut;
    }

    public function getTanggalAttribute()
    {
        return $this->waktu_daftar ? \Carbon\Carbon::parse($this->waktu_daftar)->toDateTimeString() : null;
    }
}
