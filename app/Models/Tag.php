<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $guarded = [];

    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = $value;
        $this->attributes['slug_tag'] = Str::slug($value, '_'); // Mengubah spasi menjadi garis bawah pada slug
    }
}
