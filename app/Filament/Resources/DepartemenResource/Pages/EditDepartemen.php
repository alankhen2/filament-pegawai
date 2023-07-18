<?php

namespace App\Filament\Resources\DepartemenResource\Pages;

use App\Filament\Resources\DepartemenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartemen extends EditRecord
{
    protected static string $resource = DepartemenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
