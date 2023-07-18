<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    use HasFactory;

    protected $table = 'negara';

    protected $fillable = ['negara_kode', 'nama'];

    public function provinsi(){
        return $this->hasMany(Provinsi::class);
    }
    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
