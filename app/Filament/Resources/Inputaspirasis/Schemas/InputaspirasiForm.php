<?php

namespace App\Filament\Resources\Inputaspirasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Symfony\Contracts\Service\Attribute\Required;

class InputaspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                ->required()
                ->label('NIS Siswa'),
                Select::make('id_kategori')
                ->relationship('kategori', 'nama_kategori')
                ->placeholder('Masukkan Kategori')
                ->required()
                ->label('Kategori'),
                TextInput::make('lokasi')
                ->required()
                ->label('Lokasi'),
                TextInput::make('keterangan')
                ->required()
                ->label('Keterangan'),
            ]);
    }
}
