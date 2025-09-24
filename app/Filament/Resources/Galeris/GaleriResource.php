<?php

namespace App\Filament\Resources\Galeris;

use App\Filament\Resources\Galeris\Pages\ManageGaleris;
use App\GroupNavigasi;
use App\Models\Galeri;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = GroupNavigasi::GALERI;

    protected static ?string $label = 'Galeri';

    protected static ?string $pluralLabel = 'Galeri';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama')
                    ->required(),
                TextInput::make('judul')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->maxSize(5120)
                    ->directory('galeri')
                    ->deleteUploadedFileUsing(function ($file) {
                        if ($file && Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    })
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori.nama')
                    ->sortable(),
                TextColumn::make('judul')
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageGaleris::route('/'),
        ];
    }
}
