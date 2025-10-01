<?php

namespace App\Filament\Kasir\Resources\PembayaranResource\Pages;

use App\Filament\Kasir\Resources\PembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembayarans extends ListRecords
{
    protected static string $resource = PembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
