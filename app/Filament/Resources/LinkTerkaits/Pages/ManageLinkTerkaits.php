<?php

namespace App\Filament\Resources\LinkTerkaits\Pages;

use App\Filament\Resources\LinkTerkaits\LinkTerkaitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLinkTerkaits extends ManageRecords
{
    protected static string $resource = LinkTerkaitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
