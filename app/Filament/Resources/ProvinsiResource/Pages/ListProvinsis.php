<?php

namespace App\Filament\Resources\ProvinsiResource\Pages;

use App\Filament\Resources\ProvinsiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvinsis extends ListRecords
{
    protected static string $resource = ProvinsiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
