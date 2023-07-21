<?php

namespace App\Filament\Resources\PegawaiResource\Widgets;

use App\Models\Negara;
use App\Models\Pegawai;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PegawaiStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $id = Negara::where('negara_kode', 'ID')->withCount('pegawai')->first();
        $ph = Negara::where('negara_kode', 'PH')->withCount('pegawai')->first();
        return [
            Card::make('Semua Pegawai', Pegawai::all()->count()),
            Card::make('Pegawai ' . $id->nama, $id ? $id->pegawai_count : 0),
            Card::make('Pegawai ' . $ph->nama, $ph ? $ph->pegawai_count : 0)
        ];
    }
}
