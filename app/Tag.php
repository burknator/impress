<?php

namespace Impress;

use Impress\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'color_id'];

    public function color()
    {
        return $this->belongsTo(TagColor::class);
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }
}
