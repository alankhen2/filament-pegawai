<?php

namespace App\Filament\Resources\KotaResource\Pages;

use App\Filament\Resources\KotaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKota extends EditRecord
{
    protected static string $resource = KotaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
