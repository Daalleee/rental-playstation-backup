<?php

namespace App\Filament\Resources\UnitPSResource\Pages;

use App\Filament\Resources\UnitPSResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnitPS extends EditRecord
{
    protected static string $resource = UnitPSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
