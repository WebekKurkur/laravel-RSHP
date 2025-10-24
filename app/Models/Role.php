<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = "Role";
    protected $primaryKey = 'idrole';
    public $timestamps = false;
    protected $fillable = ['idrole', 'nama_role']; //yang mau ditampilin or di apdet

    public function roleUser() {
        return $this->hasMany(RoleUser::class, 'idrole', 'idrole');
    }
    public function user() {
        return $this->belongsToMany(User::class, 'role_user','idrole', 'iduser')
        ->withPivot('status', 'idrole_user');
    }
}
