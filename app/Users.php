<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['role', 'nama', 'kelurahan', 'no_telepon','username', 'email', 'password'];

    public function laporan()
    {
        return $this->hasMany(Uploadgambar::class);
    }
}
