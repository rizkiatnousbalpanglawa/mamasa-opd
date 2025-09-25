<?php

namespace App\Filament\Resources\IdentitasOpds\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class IdentitasOpdForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->directory('opd')
                    ->deleteUploadedFileUsing(function ($file) {
                        if ($file && Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    })
                    ->columnSpanFull()
                    ->maxSize(5120)
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('singkatan')
                    ->required(),
                RichEditor::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('instagram'),
                TextInput::make('youtube'),
                TextInput::make('twitter'),
                TextInput::make('facebook'),
                TextInput::make('tiktok'),
                TextInput::make('latitude'),
                TextInput::make('longitude'),
            ]);
    }
}
