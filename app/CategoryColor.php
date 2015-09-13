<?php

namespace Impress;

use Impress\Model;
use Impress\Category;

class CategoryColor extends Model
{
    use Flatable;

    protected $fillable = ['hex'];

    protected static $flattenAttribute = 'hex';

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
