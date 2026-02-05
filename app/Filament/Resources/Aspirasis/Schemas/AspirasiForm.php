<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('status')
                    ->label('Status')
                    ->options(['Menunggu' => 'Menunggu', 'Proses' => 'Proses', 'Selesai' => 'Selesai'])
                    ->default('Menunggu')
                    ->required(),
                Select::make('id_kategori')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required(),
                TextInput::make('feedback')
                ->label('Feedback'),
            ]);
    }
}
