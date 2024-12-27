<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $guarded = [];
    protected $casts = [
        'tag' => 'array',  // Jika tags berupa array
    ];

    // Boot method untuk mengontrol perilaku slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            // Generate slug saat artikel baru dibuat
            $artikel->slug = Str::slug($artikel->judul, '_') . "_" . Str::random(6);
        });

        static::updating(function ($artikel) {
            // Pastikan slug tidak berubah saat pembaruan
            $artikel->slug = $artikel->getOriginal('slug');
        });
    }

    // Mutator untuk judul
    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        // Slug hanya diatur di event "creating" untuk mencegah perubahan otomatis saat update
    }
}
