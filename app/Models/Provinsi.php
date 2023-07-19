<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';

    protected $fillable = ['negara_id', 'nama'];

    public function negara(){
        return $this->belongsTo(Negara::class);
    }
    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }

    public function kota(){
        return $this->hasMany(Kota::class);
    }
}
