<?php

namespace Impress;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TagColor extends Eloquent
{
    use Flatable;

    protected $fillable = ['hex'];

    protected static $flattenAttribute = 'hex';

    public function tag()
    {
        return $this->hasMany(Tag::class);
    }
}
