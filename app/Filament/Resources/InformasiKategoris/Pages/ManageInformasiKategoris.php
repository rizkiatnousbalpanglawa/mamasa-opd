<?php

namespace App\Filament\Resources\InformasiKategoris\Pages;

use App\Filament\Resources\InformasiKategoris\InformasiKategoriResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageInformasiKategoris extends ManageRecords
{
    protected static string $resource = InformasiKategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
