<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded = [];
    public function setMenuAttribute($value)
    {
        // Konversi input menjadi huruf kecil sebelum disimpan ke database
        $this->attributes['menu'] = strtolower($value);
    }
}