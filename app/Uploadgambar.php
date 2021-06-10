<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadgambar extends Model
{
    protected $table = "laporan";
    protected $primaryKey = "id";
    protected $fillable = ['id_user', 'Jenis_laporan', 'nama_rt', 'Waktu', 'Lokasi', 'Penjelasan', 'Unggah_Foto', 'Status', 'Keterangan'];
    protected $hidden = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\Users', 'id_user');
    }
}
