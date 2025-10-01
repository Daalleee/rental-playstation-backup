<?php

namespace App\Filament\Pemilik\Resources\StatusResource\Pages;

use App\Filament\Pemilik\Resources\StatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStatus extends ViewRecord
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
