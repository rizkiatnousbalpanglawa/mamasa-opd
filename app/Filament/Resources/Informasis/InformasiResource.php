<?php

namespace App\Filament\Resources\Informasis;

use App\Filament\Resources\Informasis\Pages\ManageInformasis;
use App\GroupNavigasi;
use App\Models\Informasi;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class InformasiResource extends Resource
{
    protected static ?string $model = Informasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = GroupNavigasi::INFORMASI;

    protected static ?string $pluralModelLabel = 'Informasi';

    protected static ?string $label = 'Informasi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->relationship('kategori', 'kategori')
                    ->required(),
                TextInput::make('judul')
                    ->required(),

                DatePicker::make('tanggal')
                    ->default(now()),
                Radio::make('tipe')
                    ->label('Jenis Lampiran')
                    ->options([
                        'file' => 'Upload Dokumen',
                        'link' => 'Tambahkan Link',
                    ])
                    ->required()
                    ->live()
                    ->inline(),
                FileUpload::make('lampiran')
                    ->directory('informasi')
                    ->deleteUploadedFileUsing(function ($file) {
                        if ($file && Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    })
                    ->maxSize(5120)
                    ->columnSpanFull()
                    ->label('Lampiran Maksimal: 5 MB')
                    ->visible(fn(Get $get): bool => $get('tipe') === 'file'),
                TextInput::make('lampiran')
                    ->label('Link')
                    ->columnSpanFull()
                    ->url()
                    ->visible(fn($get) => $get('tipe') === 'link')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori.kategori')
                    ->sortable(),
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('views')
                    ->numeric()
                    ->sortable(),
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
            'index' => ManageInformasis::route('/'),
        ];
    }
}
