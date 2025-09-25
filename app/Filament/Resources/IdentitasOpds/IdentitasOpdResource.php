<?php

namespace App\Filament\Resources\IdentitasOpds;

use App\Filament\Resources\IdentitasOpds\Pages\CreateIdentitasOpd;
use App\Filament\Resources\IdentitasOpds\Pages\EditIdentitasOpd;
use App\Filament\Resources\IdentitasOpds\Pages\ListIdentitasOpds;
use App\Filament\Resources\IdentitasOpds\Schemas\IdentitasOpdForm;
use App\Filament\Resources\IdentitasOpds\Tables\IdentitasOpdsTable;
use App\Models\IdentitasOpd;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IdentitasOpdResource extends Resource
{
    protected static ?string $model = IdentitasOpd::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return IdentitasOpdForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IdentitasOpdsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIdentitasOpds::route('/'),
            'create' => CreateIdentitasOpd::route('/create'),
            'edit' => EditIdentitasOpd::route('/{record}/edit'),
        ];
    }
}
