<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Normalizer;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul')
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
                RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->directory('berita')
                    ->deleteUploadedFileUsing(function ($file) {
                        if ($file && Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    })
                    ->maxSize(1024)
                    ->columnSpanFull()
                    ->required(),
                Select::make('penulis_id')
                    ->relationship('penulis', 'nama')
                    ->required(),
                DateTimePicker::make('tanggal')
                    ->label('Waktu Buat')
                    ->default(now()),
            ]);
    }
}
