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

     // Mutator untuk slug otomatis
     public function setJudulAttribute($value)
     {
         $this->attributes['judul'] = $value;
         $this->attributes['slug'] = Str::slug($value, '_')."_".Str::random(6); // Mengubah spasi menjadi garis bawah pada slug
     }

}
