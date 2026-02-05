<?php

namespace App\Filament\Resources\Aspirasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                // Menampilkan NIS dari relasi inputaspirasi agar admin tahu siapa pengirimnya
                TextColumn::make('inputaspirasi.nis')
                    ->label('NIS Siswa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Menunggu' => 'gray',
                        'Proses' => 'warning',
                        'Selesai' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('feedback')
                    ->label('Feedback')
                    ->limit(50) // Membatasi teks yang muncul di tabel agar tidak kepanjangan
                    ->placeholder('Belum ada feedback'),

                TextColumn::make('created_at')
                    ->label('Tgl Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Anda bisa menambahkan filter status di sini nanti jika diperlukan
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([ // Menggunakan bulkActions bukan toolbarActions untuk grup hapus
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}