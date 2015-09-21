<?php

namespace Impress;

use Impress\CategoryColor;
use Impress\Content;
use Impress\Model;

class Category extends Model
{
    use Flatable;

    protected $fillable = ['name', 'slug', 'color_id'];

    protected $appends = ['update_link'];

    public function color()
    {
        return $this->belongsTo(CategoryColor::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function getUpdateLinkAttribute()
    {
        return route('i.categories.update', ['categories' => $this->slug]);
    }

}
