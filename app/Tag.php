<?php

namespace Impress;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tag extends Eloquent
{
    protected $fillable = ['name', 'slug', 'color_id'];

    public function color()
    {
        return $this->belongsTo(TagColor::class);
    }
}
