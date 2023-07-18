<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = ['nama_depan', 'nama_belakang', 'alamat', 'kota_id', 'provinsi_id', 'negara_id', 'departemen_id', 'kode_pos', 'tanggal_lahir', 'tanggal_masuk'];

    public function negara(){
        return $this->belongsTo(Negara::class);
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    public function departemen(){
        return $this->belongsTo(Departemen::class);
    }
}
