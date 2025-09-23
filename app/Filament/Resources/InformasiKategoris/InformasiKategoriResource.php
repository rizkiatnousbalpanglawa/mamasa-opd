<?php

namespace App\Filament\Resources\InformasiKategoris;

use App\Filament\Resources\InformasiKategoris\Pages\ManageInformasiKategoris;
use App\GroupNavigasi;
use App\Models\InformasiKategori;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Normalizer;
use UnitEnum;

class InformasiKategoriResource extends Resource
{
    protected static ?string $model = InformasiKategori::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = GroupNavigasi::INFORMASI;

    protected static ?string $pluralModelLabel = 'Kategori';

    protected static ?string $label = 'Kategori';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kategori')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $state, callable $set) {
                        // Normalisasi karakter fancy → ASCII
                        $normalized = Normalizer::normalize($state, Normalizer::FORM_KD);
                        $plain = preg_replace('/[^\p{L}\p{N}\s]/u', '', $normalized);

                        // Generate slug
                        $set('slug', Str::slug($plain));
                    }),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true) // pastikan kolom slug di DB unik
                    ->maxLength(255)
                    ->hint('Slug digunakan untuk URL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
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
            'index' => ManageInformasiKategoris::route('/'),
        ];
    }
}
