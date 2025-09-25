<?php

namespace App\Filament\Resources\IdentitasOpds\Pages;

use App\Filament\Resources\IdentitasOpds\IdentitasOpdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIdentitasOpds extends ListRecords
{
    protected static string $resource = IdentitasOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
