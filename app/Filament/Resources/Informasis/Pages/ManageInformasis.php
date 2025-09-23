<?php

namespace App\Filament\Resources\Informasis\Pages;

use App\Filament\Resources\Informasis\InformasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageInformasis extends ManageRecords
{
    protected static string $resource = InformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
