<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends model
{
        protected $table = "user";
    protected $primaryKey = 'iduser';
    public $timestamps = false;
    protected $fillable = ['iduser', 'nama', 'email', 'password']; //yang mau ditampilin or di apdet

    
public function roleUser() {
        return $this->hasMany(RoleUser::class, 'iduser', 'iduser');
    }
public function role() {
        return $this->belongsToMany(RoleUser::class, 'role_user','iduser', 'idrole')
        ->withPivot('status', 'idrole_user');
    }
public function pemilik() {
        return $this->hasOne(Pemilik::class, 'iduser','iduser');
    }

}