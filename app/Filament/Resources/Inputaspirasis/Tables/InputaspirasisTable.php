<?php

namespace App\Filament\Resources\Inputaspirasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InputaspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('nis')->searchable(),
                TextColumn::make('kategori.nama_kategori')->label('Kategori'),
                TextColumn::make('lokasi'),
                TextColumn::make('keterangan')->limit(30),

                // Kolom Status dengan Badge Warna agar user tahu progresnya
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Menunggu' => 'gray',
                        'Proses' => 'warning',
                        'Selesai' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                // Kolom Feedback dari Admin
                TextColumn::make('feedback')
                    ->label('Respon Admin')
                    ->placeholder('Belum ada tanggapan')
                    ->wrap(), // Agar teks panjang turun ke bawah

                TextColumn::make('created_at')
                    ->label('Waktu Lapor')
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}