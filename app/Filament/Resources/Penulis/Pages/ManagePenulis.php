<?php

namespace App\Filament\Resources\Penulis\Pages;

use App\Filament\Resources\Penulis\PenulisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePenulis extends ManageRecords
{
    protected static string $resource = PenulisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
