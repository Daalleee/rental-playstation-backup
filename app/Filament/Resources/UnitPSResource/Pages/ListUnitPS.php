<?php

namespace App\Filament\Resources\UnitPSResource\Pages;

use App\Filament\Resources\UnitPSResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnitPS extends ListRecords
{
    protected static string $resource = UnitPSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
