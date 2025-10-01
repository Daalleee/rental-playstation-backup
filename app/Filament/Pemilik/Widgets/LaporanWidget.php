<?php

namespace App\Filament\Pemilik\Widgets;

use App\Models\Transaksi;
use App\Models\UnitPs;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LaporanWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $start = now()->startOfMonth(); // Awal bulan ini (1 Oktober 2025)
        $end = now()->endOfMonth();    // Akhir bulan ini (31 Oktober 2025)

        return [
            Stat::make('Total Pendapatan', 'Rp ' . number_format(Transaksi::whereBetween('waktu_peminjaman', [$start, $end])
                ->sum('biaya'), 0, ',', '.'))
                ->description('Bulan ' . now()->format('F Y'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Jumlah Transaksi', Transaksi::whereBetween('waktu_peminjaman', [$start, $end])
                ->count())
                ->description('Peminjaman & Pengembalian')
                ->color('info'),
            Stat::make('Stok Tersedia', UnitPs::where('status', 'Tersedia')->sum('jumlah'))
                ->description('Unit PS')
                ->color('warning'),
        ];
    }
}
