<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inputaspirasi extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function aspirasi()
    {
        return $this->hasOne(aspirasi::class, 'inputaspirasi_id');
    }
    protected static function booted()
    {
        static::created(function ($inputaspirasi) {
            $inputaspirasi->aspirasi()->create([
                // Pastikan kita memberikan nilai string langsung atau mengambil dari model
                // Jika di inputaspirasi status kosong, kita paksa isi 'Menunggu'
                'status' => $inputaspirasi->status ?? 'Menunggu',
                'id_kategori' => $inputaspirasi->id_kategori,
                'feedback' => $inputaspirasi->feedback, // ini boleh null karena di migrasi sudah nullable()
            ]);
        });
    }
}
