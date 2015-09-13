<?php

namespace Impress;

use Impress\Model;

class TagColor extends Model
{
    use Flatable;

    protected $fillable = ['hex'];

    protected static $flattenAttribute = 'hex';

    public function tag()
    {
        return $this->hasMany(Tag::class);
    }
}
