<?php

namespace App\Filament\Resources\GaleriKategoris\Pages;

use App\Filament\Resources\GaleriKategoris\GaleriKategoriResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageGaleriKategoris extends ManageRecords
{
    protected static string $resource = GaleriKategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
