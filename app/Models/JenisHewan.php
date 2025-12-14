<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SoftDeletesByUser;

class JenisHewan extends Model
{
    use HasFactory;
    use SoftDeletesByUser;

    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nama_jenis_hewan',
    ];

    public function rasHewan()
    {
        return $this->hasMany(RasHewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }
}
