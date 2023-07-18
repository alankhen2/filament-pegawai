<?php

namespace App\Filament\Resources\NegaraResource\Pages;

use App\Filament\Resources\NegaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNegaras extends ListRecords
{
    protected static string $resource = NegaraResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
