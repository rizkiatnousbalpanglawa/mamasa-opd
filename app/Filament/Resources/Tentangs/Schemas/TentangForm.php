<?php

namespace App\Filament\Resources\Tentangs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class TentangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kategori')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->hint('Gambar boleh dikosongkan!')
                    ->image()
                    ->directory('berita')
                    ->deleteUploadedFileUsing(function ($file) {
                        if ($file && Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    })
                    ->maxSize(1024)
                    ->columnSpanFull(),
                RichEditor::make('konten')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
