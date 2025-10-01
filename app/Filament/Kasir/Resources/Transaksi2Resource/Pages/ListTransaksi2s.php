<?php

namespace App\Filament\Kasir\Resources\Transaksi2Resource\Pages;

use App\Filament\Kasir\Resources\Transaksi2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransaksi2s extends ListRecords
{
    protected static string $resource = Transaksi2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
