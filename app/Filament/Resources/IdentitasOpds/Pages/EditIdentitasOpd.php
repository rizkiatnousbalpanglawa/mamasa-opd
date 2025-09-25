<?php

namespace App\Filament\Resources\IdentitasOpds\Pages;

use App\Filament\Resources\IdentitasOpds\IdentitasOpdResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIdentitasOpd extends EditRecord
{
    protected static string $resource = IdentitasOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
