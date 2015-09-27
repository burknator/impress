<?php

namespace Impress;

use Impress\Model;

class Tag extends Model
{
    use Flatable;

    protected $flatableAttribute = 'name';

    protected $fillable = ['name', 'slug', 'color_id'];

    protected $appends = ['edit_link', 'destroy_link'];

    public function color()
    {
        return $this->belongsTo(TagColor::class);
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }

    public function getEditLinkAttribute()
    {
        return route('i.tags.edit', ['tags' => $this->slug]);
    }

    public function getDestroyLinkAttribute()
    {
        return route('i.tags.destroy', ['tags' => $this->slug]);
    }
}
