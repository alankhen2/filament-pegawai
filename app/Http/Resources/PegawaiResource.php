<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'namaDepan' => $this->nama_depan,
            'namaBelakang' => $this->nama_belakang,
            'alamat' => $this->alamat,
            'negaraId' => $this->negara_id,
            'provinsiId' => $this->provinsi_id,
            'kotaId' => $this->kota_id,
            'departemenId' => $this->departemen_id,
            'kode_pos' => $this->kode_pos,
            'tanggalLahir' => $this->tanggal_lahir,
            'tanggalMasuk' => $this->tanggal_masuk
        ];
    }
}
